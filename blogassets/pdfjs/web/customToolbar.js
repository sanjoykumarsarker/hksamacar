function editToolBar() {
  /* Hiding elements */
  //   removeElement("secondaryToolbarToggle");
  //   removeElement("scaleSelectContainer");
  //   removeElement("presentationMode");
  removeElement("print");
  //   removeElement("download");
  removeElement("viewBookmark");
  removeElement("secondaryToolbarToggle");
  removeElement("viewFind");
  removeElement("editorFreeText");
  removeElement("editorInk");
}

function removeElement(elemID) {
  let element = document.getElementById(elemID);
  element.parentNode.removeChild(element);
}

window.onload = editToolBar;
