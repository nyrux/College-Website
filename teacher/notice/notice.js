document.querySelector('.add-notice-btn').addEventListener('click', function() {
    const noticeBoard = document.createElement('div');
    noticeBoard.classList.add('notice-board');
    
    const titleInput = document.createElement('input');
    titleInput.type = 'text';
    titleInput.classList.add('notice-title');
    titleInput.placeholder = 'Enter The Title...';
    
    const descTextarea = document.createElement('textarea');
    descTextarea.classList.add('notice-desc');
    descTextarea.placeholder = 'Enter The Notice...';
    
    const btnCont = document.createElement('div');
    btnCont.classList.add('notice-btn-cont');
    
    const noticeBtn = document.createElement('button');
    noticeBtn.classList.add('notice-btn');
    const icon = document.createElement('i');
    icon.classList.add('fa-solid', 'fa-check');
    noticeBtn.appendChild(icon);
    
    btnCont.appendChild(noticeBtn);
    noticeBoard.appendChild(titleInput);
    noticeBoard.appendChild(descTextarea);
    noticeBoard.appendChild(btnCont);
    
    document.querySelector('.panel-right').appendChild(noticeBoard);
});
