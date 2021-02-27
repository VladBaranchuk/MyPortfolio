class Global{

	static animate = function({draw, duration, timing}) { // рендер, время исполнения, временная функция

        let startTime = performance.now(); // точка отсчета

        requestAnimationFrame(function animate(time) {
            let timeFraction = (time - startTime) / duration;
            if (timeFraction > 1) timeFraction = 1;

            let progress = timing(timeFraction); // рассчет прогресса от 0 до 1

            draw(progress);     // отрисовка относительно прогресса

            if (timeFraction < 1) {
                requestAnimationFrame(animate);
            }
        });
    }
}

export default Global;