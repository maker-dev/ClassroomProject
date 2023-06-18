const imgInputHelper = document.getElementById("add-single-img");
const imgInputHelperLabel = document.getElementById("add-img-label");
const imgContainer = document.querySelector(".custom__image-container");
const imgFiles = [];


const addImgHandler = () => {
    const file = imgInputHelper.files[0];
    if (!file) return;
    // Generate img preview
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => {
      const newImg = document.createElement("img");
      newImg.src = reader.result;
      imgContainer.innerHTML= `<label id="add-img-label" for="add-single-img">+</label>
      <input hidden type="file" id="add-single-img" accept="image/jpeg" />`;
      imgContainer.appendChild(newImg);
    };
    return;
  };
  imgInputHelper.addEventListener("change", addImgHandler);