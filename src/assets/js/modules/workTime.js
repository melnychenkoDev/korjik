const workTime = () => {

    let date = new Date();

    localStorage.setItem('isWorkTime', 'true');

    if ((date.getHours() < 11 && date.getMinutes() > 0) || (date.getHours() > 21 && date.getMinutes() > 0)) {
        if (localStorage.getItem('preOrder') != 'true') {
            localStorage.setItem('isWorkTime', 'false');
        }
    } else {
        localStorage.removeItem('preOrder');
    }

    // if (true) {
    //     if (localStorage.getItem('preOrder') != 'true') {
    //         localStorage.setItem('isWorkTime', 'false');
    //         document.body.style.overflow = 'hidden';
    //     }
    // } else {
    //     localStorage.removeItem('preOrder');
    // }

    const isWorkTimeBlock = document.querySelector('.we_closed');


    if (isWorkTimeBlock) {
        const isWorkTimeBlockBtn = isWorkTimeBlock.querySelector('.we_closed_btn');

        if (localStorage.getItem('isWorkTime') == 'false') {
            isWorkTimeBlock.classList.add('active');

            if (isWorkTimeBlockBtn) {
                isWorkTimeBlockBtn.addEventListener('click', () => {
                    isWorkTimeBlock.classList.remove('active');
                    localStorage.setItem('preOrder', 'true');
                })
            }

        } else {
            isWorkTimeBlock.classList.remove('active');
        }
    }
}


export default workTime;