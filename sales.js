const balance = document.getElementById("balance");
const money_plus = document.getElementById("money-plus");
const list = document.getElementById("list");
const form = document.getElementById("form");
const text = document.getElementById("text");
const amount = document.getElementById("amount");
const money_minus = document.getElementById("money-minus");
let showLi = document.getElementById("showLi");
let hideLi = document.getElementById('hideLi');

const localStorageTransations = JSON.parse(localStorage.getItem("transations"));

let transations =
  localStorage.getItem("transations") !== null ? localStorageTransations : [];

//add transation
function addTransation(e) {
  e.preventDefault();
  if (text.value.trim() === "" || amount.value.trim() === "") {
    text.placeholder = "PLEASE SOME TEXT";
    text.style.backgroundColor = "#ccc";
    text.style.fontWeight = 'bold';
    amount.placeholder = "ENTER AMOUNT";
    amount.style.backgroundColor = "#ccc";
    amount.style.fontWeight = 'bold';
  } else {
    const transation = {
      id: genenrateID(),
      text: text.value,
      amount: +amount.value,
    };
    transations.push(transation);
    addTransationDOM(transation);
    updateValues();
    updateLocalStorage();
    text.value = "";
    amount.value = "";
  }
}
//generate id
function genenrateID() {
  return Math.floor(Math.random() * 100000000);
}

//add transations to dom list
function addTransationDOM(transation) {
  //get sign
  const sign = transation.amount < 0 ? "-" : "+";
  const item = document.createElement("li");
  //add class based on value
  item.classList.add(transation.amount < 0 ? "minus" : "plus");
  item.innerHTML = `${transation.text} <span>${sign}${Math.abs(transation.amount)}</span> 
  <button class="delete-btn" onclick="removeTransation(${transation.id})">x</button>`;
  list.appendChild(item);
  item.style.display="none";
  hideLi.addEventListener('click',()=>{
    item.style.display = 'none';
    hideLi.style.display = "none";
    showLi.style.display = "block";
  });
  showLi.addEventListener('click',()=>{
    item.style.display = 'block';
    hideLi.style.display = "block";
    showLi.style.display = "none";
  })
}
// ********hide list******


// ********hide list end******
//update the balance
function updateValues() {
  const amounts = transations.map((transation) => transation.amount);
  const total = amounts.reduce((acc, item) => (acc += item), 0).toFixed(0);
  const income = amounts
    .filter((item) => item > 0)
    .reduce((acc, item) => (acc += item), 0)
    .toFixed(0);
  const expense = (
    amounts.filter((item) => item < 0).reduce((acc, item) => (acc += item), 0) *
    -1
  ).toFixed(0);

  balance.innerText = `UgShs: ${total}`;
  money_plus.innerText = `UgShs: ${income}`;
  money_minus.innerText = `UgShs: ${expense}`;
}
//remove
function removeTransation(id) {
  transations = transations.filter((transation) => transation.id !== id);
  updateLocalStorage();
  init();
}

//updatelocal storage
function updateLocalStorage() {
  localStorage.setItem("transations", JSON.stringify(transations));
}

//init
function init() {
  list.innerHTML = "";
  transations.forEach(addTransationDOM);
  updateValues();
}
init();

form.addEventListener("submit", addTransation);

// *********date calculation********
let date =document.getElementById('date');
date.value = new Date().toDateString();

// *********ionicons*******88
let icon = document.getElementById('icons');
window.onscroll = ()=>{
  if(window.scrollY >=100){
    icon.style.display = 'block';
    icon.style.position = 'fixed';
  }else{
    icon.style.display = 'none';
  }
}
icon.addEventListener('click',()=>{
  window.scrollTo({top:0, behavior:"smooth"})
})