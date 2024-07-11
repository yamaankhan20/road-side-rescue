@extends('backend.partials.master')
@section('content')
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive theme-scrollbar">
                <div id="basic-6_wrapper" class="dataTables_wrapper"><div class="dataTables_length" id="basic-6_length"><label>Show <select name="basic-6_length" aria-controls="basic-6" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="basic-6_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="basic-6"></label></div><table class="display dataTable" id="basic-6" role="grid" aria-describedby="basic-6_info" style="width: 1552px;">
                  <thead>
                    <tr role="row"><th rowspan="2" class="sorting_asc" tabindex="0" aria-controls="basic-6" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 183px;">Name</th><th colspan="2" rowspan="1">HR Information</th><th colspan="3" rowspan="1">Contact</th></tr>
                    <tr role="row"><th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 285px;">Position</th><th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 106px;">Salary</th><th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 138px;">Office</th><th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="CV: activate to sort column ascending" style="width: 52px;">CV</th><th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 93px;">Status</th><th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="E-mail: activate to sort column ascending" style="width: 268px;">E-mail</th><th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 91px;">Action</th></tr>
                  </thead>
                  <tbody>
                  <tr role="row" class="odd">
                      <td class="sorting_1">Airi Satou</td>
                      <td>Accountant</td>
                      <td>$162,700</td>
                      <td>Tokyo</td>
                      <td class="action">                                  <a class="pdf" href="../assets/pdf/sample.pdf" target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                      <td> <span class="badge rounded-pill badge-success">hired</span></td>
                      <td>a.satou@datatables.net</td>
                      <td>
                        <ul class="action">
                          <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                          <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                        </ul>
                      </td>
                    </tr><tr role="row" class="even">
                      <td class="sorting_1">Angelica Ramos</td>
                      <td>Chief Executive Officer (CEO)</td>
                      <td>$1,200,000</td>
                      <td>London</td>
                      <td class="action">                                  <a class="pdf" href="../assets/pdf/sample.pdf" target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                      <td> <span class="badge rounded-pill badge-danger">Pending</span></td>
                      <td>a.ramos@datatables.net</td>
                      <td>
                        <ul class="action">
                          <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                          <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                        </ul>
                      </td>
                    </tr><tr role="row" class="odd">
                      <td class="sorting_1">Ashton Cox</td>
                      <td>Junior Technical Author</td>
                      <td>$86,000</td>
                      <td>San Francisco</td>
                      <td class="action">                                  <a class="pdf" href="../assets/pdf/sample.pdf" target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                      <td> <span class="badge rounded-pill badge-warning"> in process</span></td>
                      <td>a.cox@datatables.net</td>
                      <td>
                        <ul class="action">
                          <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                          <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                        </ul>
                      </td>
                    </tr><tr role="row" class="even">
                      <td class="sorting_1">Bradley Greer</td>
                      <td>Software Engineer</td>
                      <td>$132,000</td>
                      <td>London</td>
                      <td class="action">                                  <a class="pdf" href="../assets/pdf/sample.pdf" target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                      <td> <span class="badge rounded-pill badge-danger">Pending</span></td>
                      <td>b.greer@datatables.net</td>
                      <td>
                        <ul class="action">
                          <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                          <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                        </ul>
                      </td>
                    </tr><tr role="row" class="odd">
                      <td class="sorting_1">Brenden Wagner</td>
                      <td>Software Engineer</td>
                      <td>$206,850</td>
                      <td>San Francisco</td>
                      <td class="action">                                  <a class="pdf" href="../assets/pdf/sample.pdf" target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                      <td> <span class="badge rounded-pill badge-success">hired</span></td>
                      <td>b.wagner@datatables.net</td>
                      <td>
                        <ul class="action">
                          <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                          <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                        </ul>
                      </td>
                    </tr><tr role="row" class="even">
                      <td class="sorting_1">Brielle Williamson</td>
                      <td>Integration Specialist</td>
                      <td>$372,000</td>
                      <td>New York</td>
                      <td class="action">                                  <a class="pdf" href="../assets/pdf/sample.pdf" target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                      <td> <span class="badge rounded-pill badge-danger">Pending</span></td>
                      <td>b.williamson@datatables.net</td>
                      <td>
                        <ul class="action">
                          <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                          <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                        </ul>
                      </td>
                    </tr><tr role="row" class="odd">
                      <td class="sorting_1">Bruno Nash</td>
                      <td>Software Engineer</td>
                      <td>$163,500</td>
                      <td>London</td>
                      <td class="action">                                  <a class="pdf" href="../assets/pdf/sample.pdf" target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                      <td> <span class="badge rounded-pill badge-warning"> in process</span></td>
                      <td>b.nash@datatables.net</td>
                      <td>
                        <ul class="action">
                          <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                          <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                        </ul>
                      </td>
                    </tr><tr role="row" class="even">
                      <td class="sorting_1">Caesar Vance</td>
                      <td>Pre-Sales Support</td>
                      <td>$106,450</td>
                      <td>New York</td>
                      <td class="action">                                  <a class="pdf" href="../assets/pdf/sample.pdf" target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                      <td> <span class="badge rounded-pill badge-warning"> in process</span></td>
                      <td>c.vance@datatables.net</td>
                      <td>
                        <ul class="action">
                          <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                          <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                        </ul>
                      </td>
                    </tr><tr role="row" class="odd">
                      <td class="sorting_1">Cara Stevens</td>
                      <td>Sales Assistant</td>
                      <td>$145,600</td>
                      <td>New York</td>
                      <td class="action">                                  <a class="pdf" href="../assets/pdf/sample.pdf" target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                      <td> <span class="badge rounded-pill badge-warning"> in process</span></td>
                      <td>c.stevens@datatables.net</td>
                      <td>
                        <ul class="action">
                          <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                          <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                        </ul>
                      </td>
                    </tr><tr role="row" class="even">
                      <td class="sorting_1">Cedric Kelly</td>
                      <td>Senior Javascript Developer</td>
                      <td>$433,060</td>
                      <td>Edinburgh</td>
                      <td class="action">                                  <a class="pdf" href="../assets/pdf/sample.pdf" target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                      <td> <span class="badge rounded-pill badge-warning"> in process</span></td>
                      <td>c.kelly@datatables.net</td>
                      <td>
                        <ul class="action">
                          <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                          <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                        </ul>
                      </td>
                    </tr></tbody>
                  <tfoot>
                    <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Salary</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">CV </th><th rowspan="1" colspan="1">Status</th><th rowspan="1" colspan="1">E-mail</th><th rowspan="1" colspan="1">Action</th></tr>
                  </tfoot>
                </table><div class="dataTables_info" id="basic-6_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div><div class="dataTables_paginate paging_simple_numbers" id="basic-6_paginate"><a class="paginate_button previous disabled" aria-controls="basic-6" data-dt-idx="0" tabindex="0" id="basic-6_previous">Previous</a><span><a class="paginate_button current" aria-controls="basic-6" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="basic-6" data-dt-idx="2" tabindex="0">2</a><a class="paginate_button " aria-controls="basic-6" data-dt-idx="3" tabindex="0">3</a><a class="paginate_button " aria-controls="basic-6" data-dt-idx="4" tabindex="0">4</a><a class="paginate_button " aria-controls="basic-6" data-dt-idx="5" tabindex="0">5</a><a class="paginate_button " aria-controls="basic-6" data-dt-idx="6" tabindex="0">6</a></span><a class="paginate_button next" aria-controls="basic-6" data-dt-idx="7" tabindex="0" id="basic-6_next">Next</a></div></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Complex headers (rowspan and colspan) Ends-->
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
@endsection
