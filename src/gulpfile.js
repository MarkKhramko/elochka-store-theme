/*
 * Gulp dependencies
 */
const gulp = require('gulp');
const plumber = require('gulp-plumber');
const sass = require('gulp-sass');
const cleanCSS = require('gulp-clean-css');
const autoprefixer = require('gulp-autoprefixer');
const minify = require('gulp-minify');
const imagemin = require('gulp-imagemin');
const webpack = require('webpack-stream');
const named = require('vinyl-named');
const sourcemaps = require('gulp-sourcemaps');
const gulpResolveUrl = require('gulp-resolve-url');

/*
 * Configuration
 */
const config = {
	source: './',
	output: '../static',
};


gulp.task('scss', () =>
	gulp.src(config.source + '/scss/*.scss')
		.pipe(plumber())
		.pipe(sourcemaps.init())
		.pipe(sass().on('error', sass.logError))
		.pipe(autoprefixer({browsers: ['> 1%', 'last 2 versions', 'Firefox ESR']}))
		.pipe(cleanCSS())
		.pipe(gulpResolveUrl())
		//.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(config.output + '/css'))
);

gulp.task('js', () =>
	gulp.src(config.source + '/js/*.js')
		.pipe(plumber())
		.pipe(named())
		.pipe(webpack({
			mode: 'development',
			module: {
				rules: [
					{
						test: /\.(js)$/,
						exclude: /(node_modules)/,
						loader: 'babel-loader',
						query: {
							presets: ['@babel/preset-env', '@babel/preset-react']
						}
					},
					{
						test: /\.scss$/,
						exclude: /(node_modules)/,
						use: [{
							loader: 'style-loader',
						}, {
							loader: 'css-loader',
						}, {
							loader: 'resolve-url-loader',
						}, {
							loader: 'sass-loader',
							options: {
								sourceMap: true,
								sourceMapContents: false
							}
						}]
					},
					{
						test: /\.(png|jpg|gif|svg)$/i,
						use: [
							{
								loader: 'url-loader',
								options: {
									limit: 8192
								}
							}
						]
					},
					{
						test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
						use: [{
							loader: 'file-loader',
							options: {
								name: '[name].[ext]',
								outputPath: 'fonts/'
							}
						}]
					}
				]
			}
		}))
		.pipe(minify({
			ext: {
				min: '.min.js'
			}
		}))
		.pipe(gulp.dest(config.output + '/js'))
);

gulp.task('images', () =>
	gulp.src(config.source + '/images/**/*')
		.pipe(imagemin())
		.pipe(gulp.dest(config.output + '/images'))
);

gulp.task('watch', ['scss'], () => {
	gulp.watch(config.source + '/scss/**/*.scss', ['scss']);
	gulp.watch(config.source + '/js/**/*', ['js']);
});

gulp.task('fonts', () =>
	gulp.src(config.source + '/fonts/**')
		.pipe(gulp.dest(config.output + '/fonts'))
);

gulp.task('build', ['images', 'fonts', 'js', 'scss']);
gulp.task('default', ['build', 'watch']);
