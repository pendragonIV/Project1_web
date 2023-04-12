//chon tat ca cac list 
var selectLists = document.querySelectorAll("#option__container");
// console.log(selectLists);
//an tat ca cac list
selectLists.forEach(element => element.style.display = "none");

function showFilter(selectedElement) {
    
    //vi the duoc gan onclick va the chua list cach nhau 2 cap nen goi 2 lan parent cua the duoc onclick ( co the su dung parentnNode)
    let listContainer = selectedElement.parentElement.parentElement;
    //sau khi lay duoc the chua list thi goi list ra
    let list = listContainer.querySelector("ul");

    if(list.style.display == "none"){
        // console.log("inner if");
        list.style.display ="block";
    }else{
        list.style.display ="none";
    }

}


