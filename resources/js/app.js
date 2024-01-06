import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aquí tu imagen",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Archivo",
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        if (document.querySelector('#imagen').value.trim())
        //en caso de que existe algo en el dropzone
        
        {
            const imagenPublicada = {};//iniciamos este objeto en 0
            imagenPublicada.size = 1234; //esto es irrelevante la size
            imagenPublicada.name =
                document.querySelector('#imagen').value; // y aqui le asignamos el nombre

            this.options.addedfile.call(this, imagenPublicada); // agregamos la imagen a la zona de carga y le decimos el archivo con imagenpublicada

            this.options.thumbnail.call(
                //agregamos la miniatura que se mostrorara y la ruta de esta , que son los dos argumentos que recibe
                this,
                imagenPublicada,
                `/uploads/${imagenPublicada.name}`
            );

            imagenPublicada.previewElement.classList.add(
                //son como css que indica la subida y lo completado como animaciones
                "dz-success",
                "dz-complete"
            );
        }
    },
});
//eventos de driopzone
dropzone.on("success", function (file, response) {
    //le asignamos el nombre que nos devuelve el json  en el controller 
    //al input que tiene el nombre name 
    // ese response lo obtenemos del controlador donde retornamos response
    document.querySelector('#imagen').value = response.imagen;
    console.log('response')
    console.log(response.imagen) ;
});

dropzone.on("removedfile", function () {
    // y aqui le asignamos un nombre vacion si lo quitan
    document.querySelector('#imagen').value = "";
});
