
@extends('backend.partials.master')
@section('content')
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid default-dashboard">
      <div class="row widget-grid">
        <div class="col-xl-5 col-md-6 proorder-xl-1 proorder-md-1">
          <div class="card profile-greeting p-0">
            <div class="card-body">
              <div class="img-overlay">
                <h1>Good day, Lena Miller</h1>
                <p>Welcome to the Mofi family! We are delighted that you have visited our dashboard.</p><a class="btn" href="index.html">Go Premium</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 proorder-xl-2 proorder-md-2">
          <div class="card">
            <div class="card-header card-no-border pb-0">
              <div class="header-top">
                <h4>Opening of leaflets</h4>
                <div class="dropdown icon-dropdown">
                  <button class="btn dropdown-toggle" id="userdropdown17" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown17"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                </div>
              </div>
            </div>
            <div class="card-body pb-0 opening-box">
              <div class="d-flex align-items-center gap-2">
                <h2>$ 12,463</h2>
                <div class="d-flex">
                  <p class="mb-0 up-arrow"><i class="fa fa-arrow-up"></i></p><span class="f-w-500 font-success">+ 20.08%</span>
                </div>
              </div>
              <div id="growthchart"> </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-5 proorder-xl-3 proorder-md-3">
          <div class="card shifts-char-box">
            <div class="card-header card-no-border pb-0">
              <div class="header-top">
                <h4>Shifts Overview  </h4>
                <div class="d-flex align-items-center gap-3">
                  <div class="location-menu dropdown">
                    <button class="btn dropdown-toggle" id="locationdropdown" data-bs-toggle="dropdown" aria-expanded="false">Location</button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown"><a class="dropdown-item" href="#">Address Selection</a><a class="dropdown-item" href="#">Geo-Menu</a><a class="dropdown-item" href="#">Place Picker</a></div>
                  </div>
                  <div class="dropdown icon-dropdown">
                    <button class="btn dropdown-toggle" id="userdropdown16" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown16"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-5">
                  <div class="overview" id="shifts-overview"></div>
                </div>
                <div class="col-7 shifts-overview">
                  <div class="d-flex gap-2">
                    <div class="flex-shrink-0"><span class="bg-primary"> </span></div>
                    <div class="flex-grow-1">
                      <h6>New</h6>
                    </div><span>86</span>
                  </div>
                  <div class="d-flex gap-2">
                    <div class="flex-shrink-0"><span class="bg-secondary"></span></div>
                    <div class="flex-grow-1">
                      <h6>Waiting for approval</h6>
                    </div><span>210</span>
                  </div>
                  <div class="d-flex gap-2">
                    <div class="flex-shrink-0"><span class="bg-warning"> </span></div>
                    <div class="flex-grow-1">
                      <h6>Assigned</h6>
                    </div><span>95</span>
                  </div>
                  <div class="d-flex gap-2">
                    <div class="flex-shrink-0"><span class="bg-tertiary"></span></div>
                    <div class="flex-grow-1">
                      <h6>Cancelled</h6>
                    </div><span>37</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-7 proorder-xl-5 box-col-7 proorder-md-5">
          <div class="card">
            <div class="card-header card-no-border pb-0">
              <div class="header-top">
                <h4>Projects</h4>
                <div class="dropdown icon-dropdown">
                  <button class="btn dropdown-toggle" id="userdropdown0" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown0"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                </div>
              </div>
            </div>
            <div class="card-body pt-0 projects px-0">
              <div class="table-responsive theme-scrollbar">
                <table class="table display" id="selling-product" style="width:100%">
                  <thead>
                    <tr>
                      <th>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="">
                          <label class="form-check-label"></label>
                        </div>
                      </th>
                      <th>Files Name</th>
                      <th>File Type</th>
                      <th>Date</th>
                      <th>Sizes</th>
                      <th>Author  </th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="">
                          <label class="form-check-label"></label>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0"><img src="../assets/images/dashboard/project/1.png" alt=""></div>
                          <div class="flex-grow-1 ms-2"><a href="product-page.html">
                              <h6>Rules Post on Dribble</h6></a></div>
                        </div>
                      </td>
                      <td class="project-dot">
                        <div class="d-flex">
                          <div class="flex-shrink-0"><span class="bg-primary"></span></div>
                          <div class="flex-grow-1">
                            <h6>Document</h6>
                          </div>
                        </div>
                      </td>
                      <td> 12 Aug 2023</td>
                      <td> 200 Kb</td>
                      <td>Monry Hasu</td>
                      <td class="text-center">
                        <div class="dropdown icon-dropdown">
                          <button class="btn dropdown-toggle" id="userdropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="">
                          <label class="form-check-label"></label>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0"><img src="../assets/images/dashboard/project/2.png" alt=""></div>
                          <div class="flex-grow-1 ms-2"><a href="product-page.html">
                              <h6>Login & Sign Up Ui</h6></a></div>
                        </div>
                      </td>
                      <td class="project-dot">
                        <div class="d-flex">
                          <div class="flex-shrink-0"><span class="bg-secondary"></span></div>
                          <div class="flex-grow-1">
                            <h6>Animation</h6>
                          </div>
                        </div>
                      </td>
                      <td> 19 Mar 2023</td>
                      <td> 3,5 Mb</td>
                      <td>Alex Madus</td>
                      <td class="text-center">
                        <div class="dropdown icon-dropdown">
                          <button class="btn dropdown-toggle" id="userdropdown2" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown2"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="">
                          <label class="form-check-label"></label>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0"><img src="../assets/images/dashboard/project/3.png" alt=""></div>
                          <div class="flex-grow-1 ms-2"><a href="product-page.html">
                              <h6>Nft website Pages</h6></a></div>
                        </div>
                      </td>
                      <td class="project-dot">
                        <div class="d-flex">
                          <div class="flex-shrink-0"><span class="bg-warning"></span></div>
                          <div class="flex-grow-1">
                            <h6>Image</h6>
                          </div>
                        </div>
                      </td>
                      <td> 30 Jun 2023</td>
                      <td> 800 Kb</td>
                      <td>Nomru Nalij</td>
                      <td class="text-center">
                        <div class="dropdown icon-dropdown">
                          <button class="btn dropdown-toggle" id="userdropdown3" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown3"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="">
                          <label class="form-check-label"></label>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0"><img src="../assets/images/dashboard/project/4.png" alt=""></div>
                          <div class="flex-grow-1 ms-2"><a href="product-page.html">
                              <h6>Square Dashboard</h6></a></div>
                        </div>
                      </td>
                      <td class="project-dot">
                        <div class="d-flex">
                          <div class="flex-shrink-0"><span class="bg-tertiary"></span></div>
                          <div class="flex-grow-1">
                            <h6>Document</h6>
                          </div>
                        </div>
                      </td>
                      <td> 24 Oct 2023</td>
                      <td> 2,8 Mb</td>
                      <td>Willium sen</td>
                      <td class="text-center">
                        <div class="dropdown icon-dropdown">
                          <button class="btn dropdown-toggle" id="userdropdown4" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown4"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="">
                          <label class="form-check-label"></label>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0"><img src="../assets/images/dashboard/project/4.png" alt=""></div>
                          <div class="flex-grow-1 ms-2"><a href="product-page.html">
                              <h6>Square Dashboard</h6></a></div>
                        </div>
                      </td>
                      <td class="project-dot">
                        <div class="d-flex">
                          <div class="flex-shrink-0"><span class="bg-tertiary"></span></div>
                          <div class="flex-grow-1">
                            <h6>Document</h6>
                          </div>
                        </div>
                      </td>
                      <td> 24 Oct 2023</td>
                      <td> 2,8 Mb</td>
                      <td>Willium sen</td>
                      <td class="text-center">
                        <div class="dropdown icon-dropdown">
                          <button class="btn dropdown-toggle" id="userdropdown5" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown5"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="">
                          <label class="form-check-label"></label>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0"><img src="../assets/images/dashboard/project/1.png" alt=""></div>
                          <div class="flex-grow-1 ms-2"><a href="product-page.html">
                              <h6>Rules Post on Dribble</h6></a></div>
                        </div>
                      </td>
                      <td class="project-dot">
                        <div class="d-flex">
                          <div class="flex-shrink-0"><span class="bg-primary"></span></div>
                          <div class="flex-grow-1">
                            <h6>Document</h6>
                          </div>
                        </div>
                      </td>
                      <td> 12 Aug 2023</td>
                      <td> 200 Kb</td>
                      <td>Monry Hasu</td>
                      <td class="text-center">
                        <div class="dropdown icon-dropdown">
                          <button class="btn dropdown-toggle" id="userdropdown6" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown6"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="">
                          <label class="form-check-label"></label>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0"><img src="../assets/images/dashboard/project/2.png" alt=""></div>
                          <div class="flex-grow-1 ms-2"><a href="product-page.html">
                              <h6>Login & Sign Up Ui</h6></a></div>
                        </div>
                      </td>
                      <td class="project-dot">
                        <div class="d-flex">
                          <div class="flex-shrink-0"><span class="bg-secondary"></span></div>
                          <div class="flex-grow-1">
                            <h6>Animation</h6>
                          </div>
                        </div>
                      </td>
                      <td> 19 Mar 2023</td>
                      <td> 3,5 Mb</td>
                      <td>Alex Madus</td>
                      <td class="text-center">
                        <div class="dropdown icon-dropdown">
                          <button class="btn dropdown-toggle" id="userdropdown7" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown7"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="">
                          <label class="form-check-label"></label>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0"><img src="../assets/images/dashboard/project/4.png" alt=""></div>
                          <div class="flex-grow-1 ms-2"><a href="product-page.html">
                              <h6>Square Dashboard</h6></a></div>
                        </div>
                      </td>
                      <td class="project-dot">
                        <div class="d-flex">
                          <div class="flex-shrink-0"><span class="bg-tertiary"></span></div>
                          <div class="flex-grow-1">
                            <h6>Document</h6>
                          </div>
                        </div>
                      </td>
                      <td> 24 Oct 2023</td>
                      <td> 2,8 Mb</td>
                      <td>Willium sen</td>
                      <td class="text-center">
                        <div class="dropdown icon-dropdown">
                          <button class="btn dropdown-toggle" id="userdropdown8" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown8"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="">
                          <label class="form-check-label"></label>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0"><img src="../assets/images/dashboard/project/3.png" alt=""></div>
                          <div class="flex-grow-1 ms-2"><a href="product-page.html">
                              <h6>Nft website Pages</h6></a></div>
                        </div>
                      </td>
                      <td class="project-dot">
                        <div class="d-flex">
                          <div class="flex-shrink-0"><span class="bg-warning"></span></div>
                          <div class="flex-grow-1">
                            <h6>Image</h6>
                          </div>
                        </div>
                      </td>
                      <td> 30 Jun 2023</td>
                      <td> 800 Kb</td>
                      <td>Nomru Nalij</td>
                      <td class="text-center">
                        <div class="dropdown icon-dropdown">
                          <button class="btn dropdown-toggle" id="userdropdown9" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt9"></i></button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown9"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="">
                          <label class="form-check-label"></label>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0"><img src="../assets/images/dashboard/project/1.png" alt=""></div>
                          <div class="flex-grow-1 ms-2"><a href="product-page.html">
                              <h6>Rules Post on Dribble</h6></a></div>
                        </div>
                      </td>
                      <td class="project-dot">
                        <div class="d-flex">
                          <div class="flex-shrink-0"><span class="bg-primary"></span></div>
                          <div class="flex-grow-1">
                            <h6>Document</h6>
                          </div>
                        </div>
                      </td>
                      <td> 12 Aug 2023</td>
                      <td> 200 Kb</td>
                      <td>Monry Hasu</td>
                      <td class="text-center">
                        <div class="dropdown icon-dropdown">
                          <button class="btn dropdown-toggle" id="userdropdown10" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown10"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-5 col-md-7 proorder-xl-4 box-col-5 proorder-md-6">
          <div class="card">
            <div class="card-header card-no-border pb-0">
              <div class="header-top">
                <h4>Customer Transaction</h4>
                <div class="dropdown icon-dropdown">
                  <button class="btn dropdown-toggle" id="userdropdown11" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown11"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                </div>
              </div>
            </div>
            <div class="card-body pb-0">
              <div id="customer-transaction"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
@endsection
