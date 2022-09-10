@extends('Layout.app')

@section('title', 'Home')

@section('content')


<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-4 mt-5">
            <div class="card text-center">
                <div class="card-header">
                    <h2>Laravel Ajax File Upload</h2>
                </div>
                <div class="card-body p-3">
                    
                    <input id="FileID" class="form-control mb-2" type="file">
                    <div class="d-grid gap-2">
                        <button onclick="onUpload()" id="UploadBtnID" class="btn btn-primary" type="button">Upload</button>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection


@section('script')

<script>

function onUpload() { 
    //Showing spinner
    let spinner = '<div class="spinner-border" role="status"></div>'
    document.getElementById('UploadBtnID').innerHTML = spinner;

    //Catch File by JS
    let myFile = document.getElementById('FileID').files[0];
    
    let myFileName = myFile.name;
    let myFileSize = myFile.size;
    let myFileFormat = myFileName.split('.').pop();
  
    // Preparing Axios
    let FileData = new FormData();
    FileData.append('FileKey', myFile)

    let config = {headers: {'content-type': 'multipart/form-data'}}

    let url = '/fileUp'

    axios.post(url, FileData, config)
    .then(function(response){
        if(response.status == 200){
            document.getElementById('UploadBtnID').innerHTML = 'Upload Success';

            //Reset Button
            setTimeout(() => {
                document.getElementById('UploadBtnID').innerHTML = 'Upload';
            }, 3000);
        }else{
            document.getElementById('UploadBtnID').innerHTML = 'Upload Failed';

            //Reset Button
            setTimeout(() => {
                document.getElementById('UploadBtnID').innerHTML = 'Upload';
            }, 3000);

        }
    }).catch(function(error){
        document.getElementById('UploadBtnID').innerHTML = 'Upload Failed';

        //Reset Button
        setTimeout(() => {
                document.getElementById('UploadBtnID').innerHTML = 'Upload';
            }, 3000);
    })
 }
    

</script>

@endsection