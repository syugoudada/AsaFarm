const deleteButton = document.querySelector('.delete-btn');

const deleteFromItemList = (target) => {
  document.querySelector(".row").removeChild(target);
};

deleteButton.addEventListener('click',()=>{
  deleteFromItemList(deleteButton.parentNode);
});