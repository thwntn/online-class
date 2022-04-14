<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Modal</title>
  </head>
  <style>
  * {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}

body {
  line-height: 1.5;
}

.modal {
  position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 10;
  visibility: hidden;
  opacity: 0;
  transition: all 300ms linear;
}
  .modal__backdrop {
    position: absolute;
    top: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.8);
    width: 100%;
    height: 100%;
    z-index: -1;
  }
  
  .modal__content {
    transition: all 300ms ease-in-out;
    width: 30%;
    margin: auto;
    z-index: 10;
    position: absolute;
    top: -100%;
    left: 50%;
    transform: translateX(-50%);
    background: white;
    padding: 15px 30px;
    border-radius: 5px;
  }
    
    .modal__header {
      border-bottom: 1px solid gray;
      margin-bottom: 15px;
    }
    
    .modal__main {
      margin-bottom: 15px;
    }
    
    .modal__footer {
      display: flex;
      align-items: center;
      justify-content: flex-end;
    }
     * {
        margin-left: 15px;
        cursor: pointer;
      }
    
  
  
  .modal:active {
    opacity: 1;
    visibility: visible;
  }
    .modal__content {
      top: 25%;
    }
  

    </style>
  <body>
  <button class="btn btn-primary" data-trigger="modal" data-target=".modal-1" aria-open="false">Modal 1</button>
  <div class="modal modal-1">
  <div class="modal__backdrop"></div>
  <div class="modal__content">
    <div class="modal__header">
      <h1>Header modal</h1>
    </div>    
    <div class="modal__main">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>    
    <div class="modal__footer">
      <div class="modal__cancel">Cancel</div>
    </div>    
  </div>
</div>  

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
const btnModals = document.querySelectorAll("[data-trigger='modal']");
btnModals.forEach(btnModal => {})
btnModals.forEach(btnModal => {
  // lấy thông tin modal
  const modal = document.querySelector(btnModal.getAttribute("data-target"));
  // lấy trạng thái modal
  const open = btnModal.getAttribute("aria-open") === "true" ? true : false;
  
  // Khởi động trạng thái mặc định của modal được set từ aria-open của button
  onActiveOrNot(btnModal, modal, open);
  
  // Bật modal thông qua button
  btnModal.addEventListener("click", () => {
    onActiveOrNot(btnModal, modal, !open);
  });

  // Tắt modal thông qua nút close
  modal.querySelector(".modal__cancel").addEventListener("click", () => {
    onActiveOrNot(btnModal, modal, !open);
  })
})  
function onActiveOrNot(buttonTargetModal, modal, open) {
  if(!modal.classList.contains("modal--active") && open) {
    modal.classList.add("modal--active")
  }
  else {
    modal.classList.remove("modal--active");
  }
  
  // đặt lại trạng thái cho nút button khi modal active | !active
  buttonTargetModal.setAttribute("aria-open", open);
}
      </script>
  </body>
</html>