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

    static getDate = function(date){
        var months = ["Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", 
                "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря"];
                 
        var myDate = new Date(date);
        var fullDate = myDate.getDate() + " " + months[myDate.getMonth()];
        // document.write(fullDate); // Сегодня: 18 Август 2015, Вторник
        return fullDate;
    }

    static findAncestor = function (el, cls) { // Поиск родительсого элемента
        while ((el = el.parentElement) && !el.classList.contains(cls));
        return el;
    }
}

export default Global;