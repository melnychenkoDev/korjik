const newsModal = () => {

    const newsParent = document.querySelector('.news__line');
    const modal = document.querySelector('#newsModal');

    if (newsParent && modal) {
        newsParent.addEventListener('click', (e) => {
            let target = e.target.closest('.news_card');

            if (!target.hasAttribute('data-news-open')) return

            let imgUrl = target.dataset.newsImg;
            let title = target.dataset.newsTitle;
            let content = target.dataset.newsContent;
            let modalHtml = '';


            modalHtml = `
                <div class="modal">
                    <div class="icon icon-plus icon-right close"></div>
                    <div class="head">
                        <img src="${imgUrl}">
                    </div>
                    <div class="body">
                        <div class="title title-big">${title}</div>
                        <div class="content">${content}</div>
                    </div>
                </div>
            `;

            modal.innerHTML = modalHtml;

            modal.classList.add('open');
            document.body.style.overflow = 'hidden';

            modal.addEventListener('click', (e) => {
                let target = e.target;

                if (e.target.closest('.close') || !e.target.closest('.modal')) {
                    modal.classList.remove('open');
                    document.body.style.overflow = null;
                    setTimeout(() => {
                        modal.innerHTML = '';
                    }, 300);
                }

            })

        });
    }

};

export default newsModal;