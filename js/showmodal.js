    let modalBtns = [...document.querySelectorAll(".button_customize")];
            
        modalBtns.forEach(function(btn) {
                btn.onclick = function() {
                let modal = btn.getAttribute('data-modal');
                document.getElementById(modal)
                    .style.display = "block";
                }
            });
            let closeBtns = [...document.querySelectorAll(".close_customize")];
            closeBtns.forEach(function(btn) {
                btn.onclick = function() {
                let modal = btn.closest('.modal_Customize');
                modal.style.display = "none";
                }
            });
            window.onclick = function(event) {
                if(event.target.className === ".modal_Customize") {
                event.target.style.display = "none";
                }
            }