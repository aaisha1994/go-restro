@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">UTM Campaign</h4>
              </div>
          </div>
      </div>
      <!-- end title -->

      <div class="row">
          <div class="col-lg-12">
              <div class="card">
                  <div class="card-body">
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-inline float-md-start">
                                <div class="search-box ms-2">
                                    <div class="position-relative">
                                        <input type="search" id="search" class="form-control rounded" placeholder="Search...">
                                        <i class="mdi mdi-magnify search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                          <div class="d-grid gap-2 d-flex justify-content-end">
                            <a href="{{Route('utm-create')}}" class="btn btn-sm btn-primary" type="button">&#43; Create</a>
                          </div>
                        </div>
                      </div>

                      <div class="table-responsive">
                          <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Campaign Name</th>
                                      <th>Restaurant Name</th>
                                      <th>UTM Link</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <th scope="row">1</th>
                                      <td>Domino’s</td>
                                      <td>Mountain Mercado</td>
                                      <td>
                                        <div class="d-flex">
                                          <div id="copyText" class="me-3">https://www.example.com/product-xyz</div>
                                          <button id="copyButton" class="btn btn-sm btn-primary" onclick="copyToClipboard()"><i class="fa fa-clone"></i></button>
                                        </div>
                                      </td>
                                      <td id="tooltip-container9" class="d-flex justify-content-start">
                                           <a href="javascript:void(0)" class="me-1 btn btn-sm btn-secondary" id="delete" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="delete" data-bs-original-title="delete"><i class="mdi mdi-delete font-size-14"></i></a>
                                      </td>
                                  </tr>
                                  <tr>
                                      <th scope="row">2</th>
                                      <td>McDonald’s</td>
                                      <td>The Spice Factory</td>
                                      <td>
                                        <div class="d-flex">
                                          <div id="copyText" class="me-3">https://www.example.com/product-xyz</div>
                                          <button id="copyButton" class="btn btn-sm btn-primary" onclick="copyToClipboard()"><i class="fa fa-clone"></i></button>
                                        </div>
                                      </td>
                                      <td id="tooltip-container9" class="d-flex justify-content-start">
                                           <a href="javascript:void(0)" class="me-1 btn btn-sm btn-secondary" id="delete" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="delete" data-bs-original-title="delete"><i class="mdi mdi-delete font-size-14"></i></a>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>

                  </div>
              </div>
          </div>
      </div>
   </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
  function copyToClipboard() {
    const copyText = document.getElementById("copyText");
    const textArea = document.createElement("textarea");
    textArea.value = copyText.innerText;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand("copy");
    document.body.removeChild(textArea);

    const copyButton = document.getElementById("copyButton");
    copyButton.style.backgroundColor = "#28a745"; // Change button color to green
    copyButton.innerHTML = '<i class="fa fa-check"></i>'; // Change button content to check icon

    setTimeout(() => {
      copyButton.style.backgroundColor = "#ED6D55"; // Change button color back to blue after 1 seconds
      copyButton.innerHTML = '<i class="fa fa-clone"></i>'; // Change button content back to clone icon
    }, 1000);
  }
</script>
@endsection
