var gulp = require('gulp'), // Подключаем Gulp
    stylus = require('gulp-stylus'), //Подключаем stylus пакет,
    browserSync = require('browser-sync'), // Подключаем Browser Sync
    nib = require('nib');

gulp.task('styl', function(){ // Создаем таск stylus
    return gulp.src('stylus/*.styl') // Берем источник
        .pipe(stylus({
            use: [nib()]
        })) // Преобразуем stylus в CSS посредством gulp-stylus
        .pipe(gulp.dest('app/css')) // Выгружаем результата в папку app/css
        .pipe(browserSync.reload({stream: true})); // Обновляем CSS на странице при изменении
});
gulp.task('php', function(){
    return gulp.src('*.php')
        .pipe(browserSync.reload({stream: true}))
});

//gulp.task('browser-sync', function() { // Создаем таск browser-sync
//    browserSync({ // Выполняем browserSync
//        server: { // Определяем параметры сервера
//            baseDir: 'app' // Директория для сервера - app
//        },
//        notify: false // Отключаем уведомления
//    });
//});

gulp.task('watch', gulp.series('styl', function() {
    gulp.watch('stylus/*.styl', gulp.series('styl')); // Наблюдение за stylus файлами
    gulp.watch('*.php', gulp.series('php'));// Наблюдение за другими типами файлов
}));