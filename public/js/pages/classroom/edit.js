let imgInputHelper = document.getElementById("add-single-img");
const imgContainer = document.querySelector(".custom__image-container");


const addImgHandler = () => {
    const file = imgInputHelper.files[0];
    if (!file) return;
    // Generate img preview
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => {
        const newImg = document.createElement("img");
        newImg.src = reader.result;
        (document.querySelector(".custom__image-container img"))?imgContainer.removeChild(document.querySelector(".custom__image-container img")):undefined;
        imgContainer.appendChild(newImg);
    };
    return;
};
imgInputHelper.addEventListener("change", addImgHandler);
