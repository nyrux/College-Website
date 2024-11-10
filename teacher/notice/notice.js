document.querySelector('.add-notice-btn').addEventListener('click', function() {
    const noticeBoard = document.createElement('div');
    noticeBoard.classList.add('notice-board');
    
    const titleInput = document.createElement('input');
    titleInput.type = 'text';
    titleInput.classList.add('notice-title');
    
    const descTextarea = document.createElement('textarea');
    descTextarea.classList.add('notice-desc');
    
    const btnCont = document.createElement('div');
    btnCont.classList.add('notice-btn-cont');
    
    const noticeBtn = document.createElement('button');
    noticeBtn.classList.add('notice-btn');
    const icon = document.createElement('i');
    icon.classList.add('fa-solid', 'fa-paper-plane');
    noticeBtn.appendChild(icon);
    
    btnCont.appendChild(noticeBtn);
    noticeBoard.appendChild(titleInput);
    noticeBoard.appendChild(descTextarea);
    noticeBoard.appendChild(btnCont);
    
    document.querySelector('.panel-right').appendChild(noticeBoard);
});
