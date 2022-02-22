const mediaAction = (maxWidth, func) => {
    window.addEventListener('resize', (e) => {
        if (e.target.screen.width, maxWidth) {
            func();
        }
    });
};

export default mediaAction;