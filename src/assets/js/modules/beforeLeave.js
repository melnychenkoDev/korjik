const beforeLeave = () => {
    window.addEventListener('unload', (e) => {
        localStorage.setItem('isWorkTime', 'true');
    })
}

export default beforeLeave;