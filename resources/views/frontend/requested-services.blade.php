@extends('frontend.layouts.master')
@section('content')
    <section class="container-fluid book-serv-sec">
        <div class="row">

            <div class="col-lg-3 col-md-3 location-form d-none">

                <form action="">
                    <h3>Your Current Location</h3>
                    <div class="location-field">
                        <input type="text" id="location_map" name="location" value="" placeholder="Enter location">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <h3>Services</h3>
                    <select id="services" name="services">
                        <option value="null" disabled selected>Choose a service</option>
                        @foreach($data_category as $key => $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select> <br><br>
                    <input type="submit" id="serv-req-btn" value="Request Now">
                </form>
            </div>

            <div class="col-lg-6 col-md-6">

                <div class="all_servicess">
                    <div class="searching_icon">
{{--                        <img src="{{ asset('frontend_assets/images/searching.svg') }}">--}}
                        <div class="loader">
                            <svg version="1.1" id="truck" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 444.3 236.3" width="200px" style="enable-background:new 0 0 444.3 236.3;" xml:space="preserve">
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <path class="st0" d="M0,0c148.1,0,296.2,0,444.3,0 M5.2,159.2c102.9,0,205.7,0,308.5,0c0-51.4,0-102.7,0-154   c-102.9,0-205.6,0-308.5,0C5.2,56.5,5.2,107.8,5.2,159.2z M114.8,181.6c69.6,0,139,0,208.7,0c0-3.6,0-7.1,0-10.6   c0.6,0,1-0.1,1.4-0.1c15.1,0,30.3,0,45.4,0c1.9,0,3.9-0.3,5.6,0.2c4.2,1.3,7.7,3.9,10.2,7.6c2.6,3.8,3.2,8.2,3.9,12.6   c0.8,4.8,1.6,9.6,2.4,14.6c0.8,0,1.5,0,2.1,0c8.5,0,17.1,0,25.6,0c6,0,12,0,17.9,0c2.4,0,3.8-1.2,3.8-3.5c0.1-3.3,0.1-6.6,0-9.9   c0-2.1-1.1-3.2-3.2-3.5c-0.4-0.1-0.8-0.1-1.1-0.2c0-0.6-0.1-1.1-0.1-1.6c0-16,0-32,0-48c0-1.9-0.2-3.9-0.7-5.7   c-5.4-22-10.9-44-16.3-66c-0.4-1.6-1.1-2.4-2.6-2.6c-5.4-0.6-10.8-1.7-16.2-1.8c-14-0.4-28.1-0.4-42.1-0.4c-9.5,0-19,0.2-28.5,0.3   c-0.6,0-1.2,0-1.9,0c-0.4,5.2-0.7,10.2-1.1,15.2c-0.5,6.1-1,12.2-1.5,18.4c-0.5,6.7-1.1,13.4-1.6,20.1c-0.5,7.4-1.1,14.8-1.3,22.2   c-0.2,7.1,0,14.2,0,21.4c0,0.6,0,1.2,0,2c-106.2,0-212.3,0-318.3,0c0,6.6,0,12.9,0,19.5c21,0,41.9,0,62.9,0   c-0.4,1.5-1.4,1.6-2.6,1.6c-16.3,0-32.7,0-49,0c-0.7,0-1.3,0-2,0c0,5.8,0,11.4,0,17.2c7.6,0,15,0,22.5,0c7.4,0,14.9,0,22.5,0   c-0.6,6.5,0.4,12.6,3.2,18.2c2.9,5.7,7.1,10.2,12.6,13.3c5.5,3.2,11.4,4.6,17.8,4.3c7.3-0.3,13.8-2.9,19.3-7.7   c8.5-7.4,12-16.9,11.2-28.3c37.1,0,74,0,110.9,0c0-5.9,0-11.5,0-17.1c-0.5,0-0.8-0.1-1.1-0.1c-19.6,0-39.2,0-58.8,0   c-19.1,0-38.2,0-57.2,0C116.2,183.2,115.3,183,114.8,181.6z M237.9,212.5c26.9,0,53.9,0,80.8,0c0-9.8,0-19.4,0-29.1   c-27,0-53.9,0-80.8,0C237.9,193.1,237.9,202.7,237.9,212.5z M355.8,236.3c16.5,0.4,32.2-13.5,32.1-32.4   c-0.1-17.4-14.6-31.9-32-31.9c-17.9,0-32.3,14.3-32.4,32.1C323.4,222.8,339.2,236.8,355.8,236.3z M189,225.2c9.7,0,19.4,0,29,0   c4.7,0,7.6-3,7.7-7.7c0-2.5-0.2-5,0-7.5c0.4-4.3-2.9-8-8-7.9c-16.4,0.1-32.8,0-49.2,0c-2.9,0-5.8,0-8.7,0c-4.5,0.1-7.3,3-7.3,7.5   c0,2.6,0,5.1,0,7.7c0,5,2.9,7.9,8,7.9C169.9,225.2,179.5,225.2,189,225.2z M315.5,52c0,35.7,0,71.2,0,106.8c2.1,0,4,0,6.1,0   c0-1,0-1.9,0-2.8c0-11.2-0.4-22.3,0-33.5c0.3-8.6,1.6-17.2,2.4-25.8c0.6-5.8,1.2-11.5,1.7-17.3c0.8-8.7,2-17.4,1.7-26.2   c0-0.4-0.1-0.7-0.2-1.1C323.4,52,319.5,52,315.5,52z M8.7,183.9c0,9.8,0,19.5,0,29.3c1.5,0,3,0,4.4,0c0-9.8,0-19.5,0-29.3   C11.5,183.9,10.1,183.9,8.7,183.9z"/>
                                    <path d="M5.2,159.2c0-51.4,0-102.6,0-154c102.8,0,205.6,0,308.5,0c0,51.3,0,102.6,0,154C210.9,159.2,108.1,159.2,5.2,159.2z"/>
                                    <path d="M114.8,181.6c0.5,1.5,1.4,1.6,2.6,1.6c19.1,0,38.2,0,57.2,0c19.6,0,39.2,0,58.8,0c0.3,0,0.7,0,1.1,0.1c0,5.6,0,11.2,0,17.1   c-37,0-73.9,0-110.9,0c0.8,11.4-2.8,20.9-11.2,28.3c-5.5,4.8-12,7.3-19.3,7.7c-6.4,0.3-12.3-1.1-17.8-4.3   c-5.5-3.2-9.7-7.7-12.6-13.3c-2.9-5.7-3.8-11.7-3.2-18.2c-7.6,0-15.1,0-22.5,0c-7.5,0-14.9,0-22.5,0c0-5.8,0-11.4,0-17.2   c0.7,0,1.4,0,2,0c16.3,0,32.7,0,49,0c1.2,0,2.1-0.1,2.6-1.6c-21,0-41.9,0-62.9,0c0-6.6,0-12.9,0-19.5c106,0,212,0,318.3,0   c0-0.8,0-1.4,0-2c0-7.1-0.2-14.2,0-21.4c0.2-7.4,0.8-14.8,1.3-22.2c0.5-6.7,1-13.4,1.6-20.1c0.5-6.1,1-12.2,1.5-18.4   c0.4-5,0.7-10,1.1-15.2c0.7,0,1.3,0,1.9,0c9.5-0.1,19-0.3,28.5-0.3c14,0,28.1,0,42.1,0.4c5.4,0.1,10.8,1.2,16.2,1.8   c1.5,0.2,2.3,1,2.6,2.6c5.4,22,10.9,44,16.3,66c0.5,1.8,0.7,3.8,0.7,5.7c0,16,0,32,0,48c0,0.5,0,1,0.1,1.6c0.4,0.1,0.8,0.2,1.1,0.2   c2.1,0.3,3.2,1.5,3.2,3.5c0.1,3.3,0.1,6.6,0,9.9c0,2.2-1.4,3.4-3.8,3.5c-6,0-12,0-17.9,0c-8.5,0-17.1,0-25.6,0c-0.7,0-1.3,0-2.1,0   c-0.8-5-1.6-9.8-2.4-14.6c-0.7-4.4-1.3-8.8-3.9-12.6c-2.6-3.7-6-6.3-10.2-7.6c-1.7-0.5-3.7-0.2-5.6-0.2c-15.1,0-30.3,0-45.4,0   c-0.4,0-0.8,0-1.4,0.1c0,3.5,0,6.9,0,10.6C253.8,181.6,184.4,181.6,114.8,181.6z M345.6,118.5c14.8,2,29.3,3.9,44,5.9   c0-17.9,0-35.6,0-53.3c-0.4-0.1-0.8-0.1-1.1-0.1c-12.6,0-25.3,0-37.9,0c-3.3,0-5,1.9-5,5.2c0,13.5,0,27,0,40.5   C345.6,117.2,345.6,117.8,345.6,118.5z M392.1,124.8c5,0.6,9.8,1.5,14.6,1.7c5.1,0.2,7.8-2.7,7.2-7.4c-0.1-0.8-0.3-1.6-0.5-2.3   c-3.8-13.6-7.7-27.2-11.5-40.8c-0.7-2.5-2.2-4.1-4.6-4.7c-1-0.3-2-0.1-3-0.3c-1.6-0.2-2.1,0.3-2.1,2c0.1,16.5,0,32.9,0,49.4   C392.1,123.1,392.1,123.8,392.1,124.8z M12.1,168.2c101.1,0,202.1,0,303.2,0c0-0.9,0-1.6,0-2.4c-101.1,0-202.1,0-303.2,0   C12.1,166.7,12.1,167.3,12.1,168.2z M434.2,126.4c-0.6-2.2-1.1-4.1-1.5-6c-4.3-16.9-8.6-33.8-12.9-50.7c-0.6-2.3-1.9-3.3-4.1-2.6   c-2.4,0.7-4.6,2-6.9,3.1c-1.1,0.5-1.4,1.4-1,2.7c3,10.5,6,21,8.9,31.4c1.9,6.8,3.9,13.7,5.8,20.5c0.2,0.8,0.3,1.6,1.6,1.6   C427.4,126.3,430.6,126.4,434.2,126.4z M73.3,204.2c-0.2,9.8,8,18.1,18,18.3c9.9,0.2,18.1-7.9,18.4-17.9   c0.3-9.8-7.8-18.3-17.5-18.6C81.5,185.7,73.2,194.3,73.3,204.2z M337.2,70.6c0,30.6,0,61,0,91.4c1,0,1.8,0,2.7,0   c0-30.5,0-60.9,0-91.4C339,70.6,338.2,70.6,337.2,70.6z M435.8,174.9C435.8,174.9,435.8,174.9,435.8,174.9c0-1.4,0-2.7,0-4.1   c0-2-0.9-3.4-2.4-3.9c-2.3-0.7-5.6-0.1-6.5,1.2c-0.3,0.5-0.6,1.3-0.6,1.9c-0.1,3.2-0.1,6.4,0,9.5c0,1.9,1.2,3.2,3.1,3.4   c1,0.1,2,0.1,3.1,0c2-0.1,3.3-1.5,3.4-3.6C435.8,177.9,435.8,176.4,435.8,174.9z M418,192.4c-5.5,0-10.9,0-16.3,0c0,2.6,0,5,0,7.5   c5.5,0,10.9,0,16.3,0C418,197.3,418,194.9,418,192.4z M366,161.5c-0.2-0.2-0.3-0.4-0.5-0.6c-6.1,0-12.1,0-18.3,0c0-1.2,0-2.3,0-3.4   c0-10,0.1-19.9,0-29.9c0-1.7-0.7-3.4-1.1-5.1c-0.1,0-0.2,0.1-0.4,0.1c0,13.2,0,26.5,0,39.8c6.5,0,12.8,0,19.2,0   C365.3,162.6,365.6,161.9,366,161.5z M418.4,173.4c1.1,0.4,1.5,0.1,1.5-1c0-13.1,0-26.2-0.1-39.2c0-1.5-0.7-3-1-4.5   c-0.1,0-0.3,0.1-0.4,0.1C418.4,143.6,418.4,158.5,418.4,173.4z M416.4,181.1C416.4,181.1,416.4,181.1,416.4,181.1   c1.1,0,2.2,0.1,3.2-0.1c1.5-0.2,2.1-1.3,2-3c-0.1-1.4-0.7-2.4-2.3-2.4c-1.8,0-3.5,0-5.3,0c-2.1,0-2.8,0.7-2.8,2.7   c0,1.9,0.8,2.7,2.9,2.7C415,181.1,415.7,181.1,416.4,181.1z M356.8,130.5c-1.1,0-2.2,0-3.2,0c-1.5-0.1-2,0.7-1.9,2.1   c0.1,1.3-0.4,2.9,1.8,2.9c1.8,0,3.6,0,5.4,0c2.9,0,3.3-0.4,3-3.4c-0.1-1-0.5-1.6-1.6-1.6C359.2,130.5,358,130.5,356.8,130.5z    M6.5,171.7c1.6,0,3.1,0,4.6,0c0-2.3,0-4.4,0-6.6c-1.6,0-3.1,0-4.6,0C6.5,167.4,6.5,169.5,6.5,171.7z"/>
                                    <path d="M237.9,212.5c0-9.8,0-19.4,0-29.1c26.9,0,53.8,0,80.8,0c0,9.7,0,19.4,0,29.1C291.8,212.5,264.9,212.5,237.9,212.5z"/>
                                    <path id="wheel1" d="M355.8,236.3c-16.6,0.5-32.4-13.4-32.3-32.2c0.1-17.8,14.5-32,32.4-32.1c17.4,0,32,14.5,32,31.9   C388,222.8,372.3,236.7,355.8,236.3z M373.9,204.3c0-10.2-8.1-18.3-18.3-18.4c-9.9,0-18.2,8.2-18.3,18.3   c-0.1,9.8,8.4,18.3,18.2,18.2C365.7,222.3,373.9,214.3,373.9,204.3z"/>
                                    <path d="M189,225.2c-9.5,0-19,0-28.5,0c-5,0-8-2.9-8-7.9c0-2.6,0-5.1,0-7.7c0-4.4,2.9-7.4,7.3-7.5c2.9-0.1,5.8,0,8.7,0   c16.4,0,32.8,0.1,49.2,0c5,0,8.3,3.6,8,7.9c-0.2,2.5,0,5,0,7.5c0,4.7-2.9,7.7-7.7,7.7C208.3,225.2,198.6,225.2,189,225.2z"/>
                                    <path d="M315.5,52c4,0,7.9,0,11.8,0c0.1,0.4,0.2,0.8,0.2,1.1c0.4,8.8-0.9,17.5-1.7,26.2c-0.5,5.8-1.1,11.5-1.7,17.3   c-0.8,8.6-2.1,17.2-2.4,25.8c-0.4,11.1-0.1,22.3,0,33.5c0,0.9,0,1.8,0,2.8c-2.1,0-4.1,0-6.1,0C315.5,123.2,315.5,87.7,315.5,52z"/>
                                    <path d="M8.7,183.9c1.5,0,2.9,0,4.4,0c0,9.7,0,19.4,0,29.3c-1.4,0-2.9,0-4.4,0C8.7,203.4,8.7,193.7,8.7,183.9z"/>
                                    <path class="st0" d="M345.6,118.5c0-0.8,0-1.3,0-1.9c0-13.5,0-27,0-40.5c0-3.3,1.7-5.2,5-5.2c12.6,0,25.3,0,37.9,0   c0.3,0,0.7,0.1,1.1,0.1c0,17.7,0,35.4,0,53.3C374.9,122.4,360.4,120.5,345.6,118.5z"/>
                                    <path class="st0" d="M392.1,124.8c0-1,0-1.7,0-2.5c0-16.5,0-32.9,0-49.4c0-1.7,0.5-2.3,2.1-2c1,0.2,2.1,0,3,0.3   c2.4,0.6,3.9,2.3,4.6,4.7c3.8,13.6,7.7,27.2,11.5,40.8c0.2,0.8,0.4,1.5,0.5,2.3c0.6,4.7-2,7.7-7.2,7.4   C401.9,126.3,397.1,125.4,392.1,124.8z"/>
                                    <path class="st0" d="M12.1,168.2c0-0.8,0-1.5,0-2.4c101,0,202,0,303.2,0c0,0.8,0,1.5,0,2.4C214.2,168.2,113.2,168.2,12.1,168.2z"/>
                                    <path class="st0" d="M434.2,126.4c-3.6,0-6.9-0.1-10.1,0c-1.3,0-1.4-0.8-1.6-1.6c-2-6.8-3.9-13.7-5.8-20.5c-3-10.5-5.9-21-8.9-31.4   c-0.4-1.3-0.1-2.1,1-2.7c2.3-1.1,4.5-2.3,6.9-3.1c2.2-0.7,3.5,0.3,4.1,2.6c4.3,16.9,8.6,33.8,12.9,50.7   C433.2,122.3,433.7,124.2,434.2,126.4z"/>
                                    <path class="st0" d="M73.3,204.2c-0.2-9.9,8.2-18.5,18.9-18.2c9.7,0.3,17.8,8.8,17.5,18.6c-0.3,10-8.5,18.1-18.4,17.9   C81.3,222.3,73.1,213.9,73.3,204.2z M91.6,218.8c8.1,0,14.6-6.3,14.7-14.6c0.1-8.2-6.6-14.8-14.7-14.8c-8.2,0-14.7,6.6-14.7,14.9   C76.9,212.5,83.4,218.9,91.6,218.8z"/>
                                    <path class="st0" d="M337.2,70.6c1,0,1.8,0,2.7,0c0,30.5,0,60.9,0,91.4c-0.9,0-1.8,0-2.7,0C337.2,131.6,337.2,101.2,337.2,70.6z"/>
                                    <path class="st0" d="M435.8,174.9c0,1.5,0,3.1,0,4.6c-0.1,2-1.4,3.4-3.4,3.6c-1,0.1-2.1,0.1-3.1,0c-1.9-0.2-3.1-1.5-3.1-3.4   c0-3.2,0-6.4,0-9.5c0-0.6,0.3-1.3,0.6-1.9c0.9-1.4,4.2-1.9,6.5-1.2c1.6,0.5,2.4,1.8,2.4,3.9C435.8,172.1,435.8,173.5,435.8,174.9   C435.8,174.9,435.8,174.9,435.8,174.9z"/>
                                    <path class="st0" d="M418,192.4c0,2.5,0,4.9,0,7.5c-5.4,0-10.8,0-16.3,0c0-2.5,0-4.9,0-7.5C407.1,192.4,412.5,192.4,418,192.4z"/>
                                    <path class="st0" d="M366,161.5c-0.4,0.4-0.7,1-1.1,1c-6.4,0.1-12.7,0-19.2,0c0-13.4,0-26.6,0-39.8c0.1,0,0.2-0.1,0.4-0.1   c0.4,1.7,1,3.4,1.1,5.1c0.1,10,0,19.9,0,29.9c0,1.1,0,2.1,0,3.4c6.2,0,12.3,0,18.3,0C365.7,161.2,365.8,161.4,366,161.5z"/>
                                    <path class="st0" d="M418.4,173.4c0-14.9,0-29.8,0-44.7c0.1,0,0.3-0.1,0.4-0.1c0.4,1.5,1,3,1,4.5c0.1,13.1,0,26.2,0.1,39.2   C419.9,173.5,419.5,173.8,418.4,173.4z"/>
                                    <path class="st0" d="M416.4,181.1c-0.7,0-1.5,0-2.2,0c-2,0-2.9-0.8-2.9-2.7c0-2,0.7-2.7,2.8-2.7c1.8,0,3.5,0,5.3,0   c1.6,0,2.2,0.9,2.3,2.4c0.1,1.8-0.6,2.9-2,3C418.6,181.2,417.5,181.1,416.4,181.1C416.4,181.1,416.4,181.1,416.4,181.1z"/>
                                    <path class="st0" d="M356.8,130.5c1.2,0,2.4,0,3.6,0c1.1,0,1.5,0.5,1.6,1.6c0.2,3-0.1,3.4-3,3.4c-1.8,0-3.6,0-5.4,0   c-2.2,0-1.8-1.6-1.8-2.9c-0.1-1.4,0.4-2.2,1.9-2.1C354.7,130.6,355.7,130.5,356.8,130.5z"/>
                                    <path class="st0" d="M6.5,171.7c0-2.2,0-4.3,0-6.6c1.5,0,3,0,4.6,0c0,2.2,0,4.3,0,6.6C9.6,171.7,8.1,171.7,6.5,171.7z"/>
                                    <path class="st0" d="M373.9,204.3c0,10-8.2,18-18.4,18.1c-9.7,0.1-18.2-8.4-18.2-18.2c0.1-10,8.3-18.3,18.3-18.3   C365.8,186,373.9,194.1,373.9,204.3z M341.1,204.1c0,8.3,6.4,14.7,14.7,14.7c8,0,14.8-6.6,14.8-14.6c0-8.1-6.6-14.8-14.7-14.9   C347.7,189.3,341.1,195.9,341.1,204.1z"/>
                                    <path d="M91.6,218.8c-8.2,0-14.7-6.4-14.7-14.5c-0.1-8.3,6.4-14.9,14.7-14.9c8.1,0,14.8,6.6,14.7,14.8   C106.1,212.5,99.7,218.8,91.6,218.8z"/>
                                    <path d="M341.1,204.1c0-8.2,6.6-14.8,14.7-14.7c8.1,0.1,14.7,6.7,14.7,14.9c0,7.9-6.7,14.6-14.8,14.6   C347.4,218.8,341,212.4,341.1,204.1z"/>
                                </g>
                              </svg>
                            <p>Loading...</p>
                        </div>
                    </div>
                    <div class="serv-wrapper">
                        <h3>Requested Services</h3>
                        <div class="inner_services">
                            <div class="serv-tabs">
                                <div class="serv-tab-img">
                                    <img src="{{ asset('frontend_assets/images/Rectangle 616.png') }}" alt="service profile">
                                </div>
                                <div class="serv-tab-disc">
                                    <p>Sed ut perspiciatis unde omnis iste</p>
                                    <div class="serv-rating">
                                        <img src="{{ asset('frontend_assets/images/Group 7698.png') }}" alt="start">
                                        <span>4.5 Rating</span>
                                    </div>
                                    <div class="hire-serv">
                                        <span><img src="{{ asset('frontend_assets/images/Group 8485.png') }}" alt="Toing">Toing</span>
                                        <span><img src="{{ asset('frontend_assets/images/Group 9013.png') }}" alt="Mechanic">Mechanic</span>
                                    </div>
                                </div>
                                <div class="serv-tab-info">
                                    <div class="trace">
                                        <span class="track-time">10 mins</span>
                                        <div class="track-distance">
                                            <span class="track-st">1609 Oak, St.</span>
                                            <span class="track-km">(2km)</span>
                                        </div>
                                    </div>
                                    <div class="activate-btns">
                                        <a href="javascript:;" class="hire-btn">hire me</a>
                                        <a href="javascript:;" class="share-btn"><img src="{{ asset('frontend_assets/images/send.png') }}"
                                                                                      alt="send"></a>
                                        <a href="javascript:;" class="call-btn"><img src="{{ asset('frontend_assets/images/call.png') }}"
                                                                                     alt="call"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="map-wrapper">
                    <div class="map-js-height" id="weathermap"></div>
                </div>
            </div>
        </div>
    </section>

    <script>
        jQuery('.serv-wrapper').hide();
        let map, infoWindow;

        const locations = document.getElementById("location_map");

        function initMap() {
            map = new google.maps.Map(document.getElementById("weathermap"), {
                center: { lat: 37.0902, lng: -95.7129 },
                zoom: 14.5,
            });
            infoWindow = new google.maps.InfoWindow();


            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            let location = urlParams.get('location');
            let serv = urlParams.get('serv');




            const countries = [
                    @foreach($all_vendor_details as $service)
                        @forEach($service->vendor_all as $new_serv)
                {
                    id:'{{$new_serv->id}}',
                    name: '{{ $new_serv->name }}',
                    location: '{{ $new_serv->country }}',
                    profile_pic: '/storage/{{$new_serv->profile_pic}}',
                    Category_id: '{{$service->category_id}}'
                },
                  @endforeach
                @endforeach
            ];

            locat_user_lon_lat(location)
                .then(location => {
                    countries.forEach(country => {
                        geocodeCountry(country, location);
                    });
                })
                .catch(error => {
                    console.error(error);
                });




            if (location) {
                geocodeAddress(location);
                locations.value = location;
            }
            else {
                map = new google.maps.Map(document.getElementById("weathermap"), {
                    center: { lat: 37.0902, lng: -95.7129 },
                    zoom: 4,
                });
                // if (navigator.geolocation) {
                //     navigator.geolocation.getCurrentPosition(
                //         (position) => {
                //
                //             const pos = {
                //                 lat: position.coords.latitude,
                //                 lng: position.coords.longitude,
                //             };
                //             console.log(position.coords);
                //             infoWindow.setPosition(pos);
                //             infoWindow.setContent("Your Location");
                //             infoWindow.open(map);
                //             map.setCenter(pos);
                //
                //             const geocoder = new google.maps.Geocoder();
                //             geocoder.geocode({ location: pos }, (results, status) => {
                //                 if (status === "OK") {
                //                     if (results[0]) {
                //                         new google.maps.Marker({
                //                             map: map,
                //                             position: results[0].geometry.location,
                //                             title: results[0].formatted_address,
                //                             zIndex:9999
                //                         });
                //                         new google.maps.Circle({
                //                             map: map,
                //                             center: pos,
                //                             radius: 1000,
                //                             fillColor: '#c4dbee96',
                //                             fillOpacity: 0.35,
                //                             strokeColor: '#c4dbee',
                //                             strokeOpacity: 1,
                //                             strokeWeight: 2,
                //                             zIndex: 0
                //                         });
                //                         locations.value = results[0].formatted_address;
                //                     } else {
                //                         locations.value = "Unknown location";
                //                     }
                //                 } else {
                //                     locations.value = "Geocoder failed due to: " + status;
                //                 }
                //             });
                //         },
                //         () => {
                //             handleLocationError(true, infoWindow, map.getCenter());
                //         },
                //     );
                // } else {
                //     handleLocationError(false, infoWindow, map.getCenter());
                // }
            }

        }

        function createCustomMarkerImage(url) {
            return new Promise((resolve, reject) => {
                const canvas = document.createElement('canvas');
                const context = canvas.getContext('2d');

                const size = 50; // Size of the marker
                canvas.width = size;
                canvas.height = size;

                // Draw the image first
                const img = new Image();
                img.src = url;

                img.onload = () => {
                    // Draw the image with a circular clipping region
                    context.beginPath();
                    context.arc(size / 2, size / 2, size / 2 - 5, 0, Math.PI * 2);
                    context.clip(); // Clip to the circle

                    context.drawImage(img, 0, 0, size, size); // Draw the image covering the whole canvas

                    // Draw the border
                    context.beginPath();
                    context.arc(size / 2, size / 2, size / 2 - 5, 0, Math.PI * 2);
                    context.lineWidth = 5; // Border thickness
                    context.strokeStyle = 'blue'; // Border color
                    context.stroke(); // Draw the border

                    resolve(canvas.toDataURL()); // Resolve the Promise with the data URL
                };

                img.onerror = (error) => {
                    reject(error); // Reject the Promise if there's an error loading the image
                };
            });
        }

        function geocodeCountry(country , location) {
            const userLocation = new google.maps.LatLng(location.lat, location.lng);

            const geocoder = new google.maps.Geocoder();

            const default_image = "/backend_assets/images/dashboard/profile.png";
            const new_image = (country.profile_pic && country.profile_pic.trim() !== "/storage/" && country.profile_pic.trim().startsWith('/storage/')) ? country.profile_pic : default_image;

            createCustomMarkerImage(new_image).then(customMarkerUrl => {

                geocoder.geocode({address: country.location}, (results, status) => {
                    if (status === "OK" && results[0]) {
                        const all_location = results[0].geometry.location;
                        const vendorLat = all_location.lat();
                        const vendorLng = all_location.lng();
                        const serviceLocation = new google.maps.LatLng(vendorLat, vendorLng);
                        const distance = google.maps.geometry.spherical.computeDistanceBetween(userLocation, serviceLocation);

                        if (distance <= 1000) {
                            const blueMarkerIcon = {};
                            const marker = new google.maps.Marker({
                                position: results[0].geometry.location,
                                map: map,
                                icon: {
                                    url: customMarkerUrl,
                                    scaledSize: new google.maps.Size(50, 50)
                                },
                            });


                            // const contentString = '<div>' +
                            //     '<h3>' + country.id + '</h3>' +
                            //     '</div>';
                            //
                            // const infowindow = new google.maps.InfoWindow({
                            //     content: contentString,
                            // });

                            marker.addListener('click', () => {
                                    jQuery('.searching_icon').show();
                                    jQuery('.serv-wrapper').hide();
                                    get_services(country.id, country.Category_id);

                            });
                        }

                    } else {
                        console.error("Geocode was not successful for the following reason: " + status);
                    }
                });

            }).catch(error => {
                console.error("Error creating marker image: ", error);
            });
        }

        function geocodeAddress(address) {
            const geocoder = new google.maps.Geocoder();

            geocoder.geocode({ address: address }, (results, status) => {
                if (status === "OK") {
                    const all_location = results[0].geometry.location;

                    const pos = {
                        lat: all_location.lat(),
                        lng: all_location.lng(),
                    };
                    new google.maps.Circle({
                        map: map,
                        center: pos,
                        radius: 1000,
                        fillColor: '#c4dbee96',
                        fillOpacity: 0.35,
                        strokeColor: '#c4dbee',
                        strokeOpacity: 1,
                        strokeWeight: 2,
                        zIndex: 0
                    });
                    map.setCenter(results[0].geometry.location);
                    new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                        title: address,
                    });
                } else {
                    console.error("Geocode was not successful for the following reason: " + status);
                }
            });
        }

        function locat_user_lon_lat(address) {
            return new Promise((resolve, reject) => {
                const geocoder = new google.maps.Geocoder();
                geocoder.geocode({ address: address }, (results, status) => {
                    if (status === "OK" && results[0]) {
                        const all_location = results[0].geometry.location;
                        resolve({ lat: all_location.lat(), lng: all_location.lng() });
                    } else {
                        reject('Location not found');
                    }
                });
            });
        }
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation
                    ? "Error: The location service failed."
                    : "Error: Your browser doesn't support location.",
            );
            infoWindow.open(map);
        }
        document.addEventListener('DOMContentLoaded', initMap);



        function get_services(vendor_id, Category_id){

            jQuery.ajax({
                url: "{{ route('services_vendorID') }}",
                type: "get",
                data: {
                    vendor_id: vendor_id,
                    Category_id: Category_id

                },
                success: function (data) {
                    if(data.success){
                        setTimeout(()=>{
                            jQuery('.searching_icon').hide();
                            jQuery('.serv-wrapper').show();
                            $('.serv-wrapper .inner_services').html(data.data);
                        }, 1800);

                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });

        }
    </script>
    <script>

        async function AutoFill() {
            const fromInput = document.getElementById('location_map');
            const fromAutocomplete = new google.maps.places.Autocomplete(fromInput);
        }

        window.onload = AutoFill;


    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places&callback=initMap" defer ></script>
@endsection
