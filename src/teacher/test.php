<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Modal</title>
  </head>\
  <style>
    body {
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}

.container {
  width: 992px;
  margin: 0 auto;
}

.btn {
  padding: 0.5rem 1rem;
  border: 1px solid #ccc;
  border-radius: 4px;
  cursor: pointer;
  outline: none;
}

.btn:active {
  transform: scale(0.9);
}

.close-modal {
  background: none;
  border: none;
  font-size: 1.5rem;
}

.modal {
  width: 450px;
  position: fixed;
  top: -50%;
  left: 50%;
  transform: translate(-50%, -50%);
  transition: top 0.3s ease-in-out;
  border: 1px solid #ccc;
  border-radius: 10px;
  z-index: 2;
  background-color: #fff;
}

.modal.active {
  top: 15%;
}

.modal .header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid #ccc;
  padding: 0.5rem;
  background-color: rgba(0, 0, 0, 0.05);
}

.modal .body {
  padding: 0.75rem;
}

#overlay {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.3);
}

#overlay.active {
  display: block;
}
    </style>
  <body>
    <div class="container">
      <button class="btn" data-target="#modal1">Open Modal</button>
      <button class="btn" data-target="#modal2">Open Modal 2</button>
      <br />
     
    </div>

    <div class="modal" id="modal1">
      <div class="header">
        <div class="title">First Modal</div>
        <button class="btn close-modal">&times;</button>
      </div>
      <div class="body">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere ea
        officia consectetur. Laborum, dolor? Assumenda quo corrupti eveniet
        velit fugit fugiat odit, dolorum labore obcaecati quia. Commodi
        assumenda sed maxime!
      </div>
    </div>
    <div class="modal" id="modal2">
      <div class="header">
        <div class="title">Second Modal</div>
        <button class="btn close-modal">&times;</button>
      </div>
      <div class="body">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere ea
        officia consectetur. Laborum, dolor? Assumenda quo corrupti eveniet
        velit fugit fugiat odit, dolorum labore obcaecati quia. Commodi
        assumenda sed maxime!
      </div>
    </div>

    <div id="overlay"></div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
const btns = document.querySelectorAll("[data-target]");
const close_modals = document.querySelectorAll(".close-modal");
const overlay = document.getElementById("overlay");

btns.forEach((btn) => {
  btn.addEventListener("click", () => {
    document.querySelector(btn.dataset.target).classList.add("active");
    overlay.classList.add("active");
  });
});

close_modals.forEach((btn) => {
  btn.addEventListener("click", () => {
    const modal = btn.closest(".modal");
    modal.classList.remove("active");
    overlay.classList.remove("active");
  });
});

window.onclick = (event) => {
  if (event.target == overlay) {
    const modals = document.querySelectorAll(".modal");
    modals.forEach((modal) => modal.classList.remove("active"));
    overlay.classList.remove("active");
  }
};
      </script>
  </body>
</html>