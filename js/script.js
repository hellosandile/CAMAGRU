var putfile = document.querySelector('#upfile');
var uploadfile = document.querySelector('#choosefile');

uploadfile.addEventListener('change', (event)=>
{
    var reader = new FileReader;
    reader.addEventListener('load', (event)=>
    {
    putfile.src = reader.result;
    });
    reader.readAsDataURL(uploadfile.files[0]);
});