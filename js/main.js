function getObjectFromItem(item) {
    let itemName = item.querySelector('p').innerText;
    let tempArray = itemName.split(' ');
    itemName = tempArray[tempArray.length - 1];
    let tempItem;
    for (let key in sessionStorage){
        if (!sessionStorage.hasOwnProperty(key)) {
            continue;
        }
        tempItem = JSON.parse(sessionStorage.getItem(`${key}`))
        if (tempItem.name === itemName){
            break;
        }
    }
    return tempItem;
}
let itemForChange;
let viewItemForChange;
function changeItemData() {
    if (!document.getElementById('changeItemName').value){
        document.getElementById('changeItemName').style.border = '1px solid red';
        return;
    } else {
        document.getElementById('changeItemName').style.border = '';
    }
    itemForChange.name = document.getElementById('changeItemName').value;
    for (let key in sessionStorage){
        if (!sessionStorage.hasOwnProperty(key)) {
            continue;
        }
        let tempItem = JSON.parse(sessionStorage.getItem(`${key}`));
        if (+key !== +itemForChange.id && tempItem.name === itemForChange.name){
            document.getElementById('changeItemName').style.border = '1px solid red';
            return;
        } else {
            document.getElementById('changeItemName').style.border = '';
        }
    }
    itemForChange.color = document.getElementById('changeSelect-color').value;
    itemForChange.cost= document.getElementById('changeItemCost').value;
    if (isNaN(+itemForChange.cost) || !itemForChange.cost || +itemForChange.cost <= 0){
        document.getElementById('changeItemCost').style.border= '1px solid red';
        return;
    } else {
        document.getElementById('changeItemCost').style.border= '';
    }
    itemForChange.brand = document.getElementById('changeSelect-brand').value;

    viewItemForChange.querySelector('p').innerText = `Название товара: ${itemForChange.name}`;
    viewItemForChange.querySelector('p + p').innerText = `Цвет товара: ${itemForChange.color}`;
    viewItemForChange.querySelector('p + p + p').innerText = `Цена товара: ${itemForChange.cost}`;
    viewItemForChange.querySelector('p + p + p + p').innerText = `Бренд товара: ${itemForChange.brand}`;
    console.log(itemForChange);
    sessionStorage.setItem(itemForChange.id, JSON.stringify(itemForChange));
}
function changeItem(item) {
    if (document.querySelector('.change-item-menu').style.display === 'block'){
        alert('Вы не можете изменять или удалять что-то сейчас');
        return;
    }
    document.querySelector('.change-item-menu').style.display = 'block';
    const tempItem = getObjectFromItem(item);
    document.getElementById('changeItemName').value = tempItem.name;
    document.getElementById('changeSelect-color').value = tempItem.color;
    document.getElementById('changeItemCost').value = tempItem.cost;
    document.getElementById('changeSelect-brand').value = tempItem.brand;
    itemForChange = tempItem;
    viewItemForChange = item;
}
function closeChangeItemMenu(){
    document.querySelector('.change-item-menu').style.display = 'none';
}
function deleteItem(item) {
    if (document.querySelector('.change-item-menu').style.display === 'block'){
        alert('Вы не можете изменять или удалять что-то сейчас');
        return;
    }
    let itemName = item.querySelector('p').innerText;
    let tempArray = itemName.split(' ');
    itemName = tempArray[tempArray.length - 1];
    for (let key in sessionStorage){
        if (!sessionStorage.hasOwnProperty(key)) {
            continue;
        }
        let tempItem = JSON.parse(sessionStorage.getItem(`${key}`))
        if (tempItem.name === itemName){
            sessionStorage.removeItem(key);
        }
    }
    item.remove();
}
function clearItems() {
    document.querySelector('.item-menu').textContent = '';
    sessionStorage.clear();
}
function showAllItem() {
    for (let key in sessionStorage){
        if (!sessionStorage.hasOwnProperty(key)) {
            continue;
        }
        showItem(sessionStorage.getItem(`${key}`));
    }
}
showAllItem();
function showItem(item) {
    item = JSON.parse(item);
    const newItem = document.createElement('div');
    newItem.classList.add('item');
    const newItemName = document.createElement('p');
    newItemName.innerText = `Название товара: ${item.name}`;
    newItem.append(newItemName);
    const newItemColor = document.createElement('p');
    newItemColor.innerText = `Цвет товара: ${item.color}`;
    newItem.append(newItemColor);
    const newItemCost = document.createElement('p');
    newItemCost.innerText = `Цена товара: ${item.cost}`;
    newItem.append(newItemCost);
    const newItemBrand = document.createElement('p');
    newItemBrand.innerText = `Бренд товара: ${item.brand}`;
    newItem.append(newItemBrand);
    const deleteItemBtn = document.createElement('button');
    deleteItemBtn.innerText = 'Удалить товар';
    deleteItemBtn.setAttribute('onclick', "deleteItem(this.closest('div'))");
    newItem.append(deleteItemBtn);
    const changeItemBtn = document.createElement('button');
    changeItemBtn.innerText = 'Изменить товар';
    changeItemBtn.setAttribute('onclick', "changeItem(this.closest('div'))");
    newItem.append(changeItemBtn);
    //
    //
    const gridMenu = document.querySelector('.item-menu');
    gridMenu.append(newItem);
}

function openAddItemMenu(){
     document.querySelector('.add-item-menu').style.display = 'block';
}

function closeAddItemMenu() {
    document.querySelector('.add-item-menu').style.display = 'none';
}

function addItem(){
 const itemNameValue = document.getElementById('itemName').value.trim();
 if (!itemNameValue){
     document.querySelector('.item-name > input').style.border= '1px solid red';
     return;
 } else {
     document.querySelector('.item-name > input').style.border= '';
 }
 for (let key in sessionStorage){
     if (!sessionStorage.hasOwnProperty(key)) {
         continue;
     }
     let tempItem = JSON.parse(sessionStorage.getItem(`${key}`));
     if(tempItem.name === itemNameValue){
         document.querySelector('.item-name > input').style.border= '1px solid red';
         return;
     }
 }
 const itemColorValue = document.getElementById('select-color').value;
 const itemCostValue = +document.getElementById('itemCost').value.trim();
 if (isNaN(+itemCostValue) || !itemCostValue || +itemCostValue <= 0){
     document.querySelector('.item-cost > input').style.border= '1px solid red';
     return;
 } else {
     document.querySelector('.item-cost > input').style.border= '';
 }
 const itemBrandValue = document.getElementById('select-brand').value;
 const itemId  = Math.random();
 const item = {
     name: itemNameValue,
     color: itemColorValue,
     cost: itemCostValue,
     brand: itemBrandValue,
     id: itemId
 };
 document.getElementById('itemName').value = '';
 document.getElementById('select-color').value = '';
 document.getElementById('itemCost').value = '';
 document.getElementById('select-brand').value = '';
 sessionStorage.setItem(`${itemId}`, JSON.stringify(item));
 showItem(JSON.stringify(item));
}
function  filter(){
    const itemColorValue = document.getElementById('select-color-filter').value;
    const itemLowerCostValue = +document.getElementById('lower-cost-border').value.trim();
    if (isNaN(+itemLowerCostValue) || !itemLowerCostValue || +itemLowerCostValue <= 0){
        document.getElementById('lower-cost-border').style.border= '1px solid red';
        return;
    } else {
        document.getElementById('lower-cost-border').style.border= '';
    }
    const itemUpperCostValue = +document.getElementById('upper-cost-border').value.trim();
    if (isNaN(+itemUpperCostValue) || !itemUpperCostValue || +itemUpperCostValue <= 0){
        document.getElementById('upper-cost-border').style.border= '1px solid red';
        return;
    } else {
        document.getElementById('upper-cost-border').style.border= '';
    }
    if (itemLowerCostValue > itemUpperCostValue){
        document.getElementById('upper-cost-border').style.border= '1px solid red';
        document.getElementById('lower-cost-border').style.border= '1px solid red';
        return;
    } else {
        document.getElementById('lower-cost-border').style.border= '';
        document.getElementById('upper-cost-border').style.border= '';
    }
    const itemBrandValue = document.getElementById('select-brand-filter').value;
    document.querySelector('.item-menu').textContent = '';
    for (let key in sessionStorage){
        if (!sessionStorage.hasOwnProperty(key)) {
            continue;
        }
        const item = JSON.parse(sessionStorage.getItem(`${key}`));
        if ((item.color === itemColorValue || itemColorValue === 'all') &&
            (item.brand === itemBrandValue || itemBrandValue === 'all') &&
            (item.cost >= itemLowerCostValue && item.cost <= itemUpperCostValue)
        ){
            showItem(sessionStorage.getItem(`${key}`));
        }
    }
}
function filterByName() {
    const itemNameValue = document.getElementById('name-filter').value.trim();
    if (!itemNameValue) {
        document.getElementById('name-filter').style.border = '1px solid red';
        return;
    } else {
        document.getElementById('name-filter').style.border = '';
    }
    document.querySelector('.item-menu').textContent = '';
    for (let key in sessionStorage){
        if (!sessionStorage.hasOwnProperty(key)) {
            continue;
        }
        const item = JSON.parse(sessionStorage.getItem(`${key}`));
        const itemName = item.name.slice(0, itemNameValue.length);
        console.log(itemName);
        if (itemName === itemNameValue){
            showItem(sessionStorage.getItem(`${key}`));
        }
    }
}