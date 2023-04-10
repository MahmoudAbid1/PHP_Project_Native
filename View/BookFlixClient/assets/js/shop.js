const myButtons = document.querySelectorAll(".size-option");

myButtons.forEach(button => {
  button.addEventListener("click", function() {
     console.log(button.style.backgroundColor);
    button.classList.toggle("size-clicked");
    if(button.classList.contains("size-clicked")){
        button.style.backgroundColor = "red";
        button.style.color = "white";
        button.style.outline = "none";
     }
     else
     {
       button.style.backgroundColor = "#EDEDED";
       button.style.color = "black";
       button.style.outline = "none";
     }

  });
});

function toggleColor(button, color) {
    button.classList.toggle("color-clicked");
    if (button.classList.contains("color-clicked")) {
      button.style.backgroundColor = color;
      if (button.getAttribute('id') === 'white') {
        // do something if the element's id is 'white'
        button.style.color = "black";
      }
      else{
        button.style.color = "white";
      }
    } else {
      button.style.backgroundColor = "#EDEDED";
      button.style.color = "black";
    }
    button.style.borderColor = "white";
  }
  
  const myButton = document.getElementById("red");
  myButton.addEventListener("click", function() {
    toggleColor(myButton, "red");
  });
  
  const myButton2 = document.getElementById("green");
  myButton2.addEventListener("click", function() {
    toggleColor(myButton2, "#20c997");
  });
  
  const myButton3 = document.getElementById("blue");
  myButton3.addEventListener("click", function() {
    toggleColor(myButton3, "#007bff");
  });

  const myButton4 = document.getElementById("yellow");
  myButton4.addEventListener("click", function() {
    toggleColor(myButton4, "#ffc107");
  });

  const myButton5 = document.getElementById("black");
  myButton5.addEventListener("click", function() {
    toggleColor(myButton5, "black");
  });
  const myButton6 = document.getElementById("white");
  myButton6.addEventListener("click", function() {
    toggleColor(myButton6, "white");
  });
  


  //submit filter button on click 
  function checkPrices() {
    console.log("d5al");
    const minValue = parseInt(document.getElementById("min-value").value);
    const maxValue = parseInt(document.getElementById("max-value").value);
    const minLabel = document.querySelector('label[for="min-value"]');
    const maxLabel = document.querySelector('label[for="max-value"]');
  
    if (minValue >= 0 && maxValue >= 0 && minValue < maxValue) {
      minLabel.style.color = "green";
      maxLabel.style.color = "green";
      minLabel.textContent = `Min Value (Success: ${minValue})`;
      maxLabel.textContent = `Max Value (Success: ${maxValue})`;
    } else {
      minLabel.style.color = "red";
      maxLabel.style.color = "red";
      minLabel.textContent = `Min Value (Error: ${minValue})`;
      maxLabel.textContent = `Max Value (Error: ${maxValue})`;
    }
  }







  const filterMenu = document.querySelector(".filter_box");
  const filterTrigger = document.querySelector(".filter-trigger");
  const filterClose = document.querySelector(".filter-close");

  //show the filter menu
  filterTrigger.addEventListener("click", function() {
    filterMenu.classList.add("show");
  });
//close the filter menu
filterClose.addEventListener("click", function() {
    filterMenu.classList.remove("show");
  });




// Get all product card elements
const container = document.querySelector('.container-product');
const products = document.querySelectorAll('.product-card');

function annimationScroll(){
  products.forEach(product => {
   const rect=product.getBoundingClientRect();
   if(rect.top< window.pageYOffset+window.innerHeight*0.8)
    {
      product.classList.add('annimate');
    }
    else
    {
      product.classList.remove('annimate');

    }


  });
}

container.addEventListener("scroll",annimationScroll);



