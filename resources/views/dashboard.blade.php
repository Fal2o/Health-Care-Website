
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
     HealthCare Project
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/assets/demo/demo.css" rel="stylesheet" />

  
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
        <div class="logo">
            
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                @if (Auth::user()->user_type !='admin')
                    HealthCare  | User
                @else
                    HealthCare  | Admin
                @endif
                
            </a>
        </div>
        
        <div class="sidebar-wrapper" id="sidebar-wrapper">
          
          @if (Auth::user()->user_type =='admin')
          <ul class="nav">
            <li class="active ">
              <a href="/dashboard">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
              </a>
            </li>
            <li class="{{ 'admin' == request()->path() ? 'active ' : '' }}">
              <a href="/admin">
              <i class="now-ui-icons users_single-02"></i>
              <p>User Profile</p>
              </a>
            </li>
            <li class ="{{ 'admin/activity' == request()->path() ? 'active ' : '' }}"">
              <a href="/admin/activity">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Table List</p>
              </a>
            </li>
          </ul>

          @else
          <!-- แก้เป็นของ user -->
          <ul class="nav">
            <li class="active ">
              <a href="/dashboard">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
              </a>
            </li>
            <li class="">
              <a href="/showbody">
              <i class="now-ui-icons text_bold"></i>
              <p>Body</p>
              </a>
          </li>
            <li>
              <a href="/showexercise">
              <i class="now-ui-icons sport_user-run"></i>
              <p>Exercise</p>
              </a>
            </li>
            <li>
              <a href="/sleeps">
              <i class="now-ui-icons ui-2_time-alarm"></i>
              <p>sleeps</p>
              </a>
            </li>
            <li class ="{{ '' == request()->path() ? 'active ' : '' }}"">
                <a href="/mens">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p>menstruation</p>
                </a>
            </li>
            <li>
              <a href="/healthrecord">
              <i class="now-ui-icons emoticons_satisfied"></i>
              <p>Food</p>
              </a>
            </li>
            {{-- <li class="active-pro">
              <a href="./upgrade.html">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Upgrade to PRO Admin</p>
              </a>
            </li> --}}
          </ul>
          @endif
          
          
        </div>
    </div>
        
          
    <div class="main-panel" id="main-panel">
      <!-- Navbar แถบค้นหาด้านบน-->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            {{-- <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form> --}}
            <ul class="navbar-nav">
              {{-- <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li> --}}
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  {{Auth::user()->name}}
                  {{-- <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p> --}}
                 
                </a>
                
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <!--ปุ่ม  log out-->
                    <form method="POST" action="{{ route('logout') }}" >
                      @csrf

                      <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      this.closest('form').submit();">
                          {{ __('Log Out') }}
                      </a>
                    </form>
                  
                  {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                </div>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li> --}}
            </ul>
          </div>
        </div>
      </nav> 
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
        
      </div>
      <div class="content">
    
      @if (Auth::user()->user_type == 'admin')
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Welcome to</h5>
                <h4 class="card-title">  HealthCareProject</h4>       
              </div>

            
              
              <div class="dropdown">
                <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                  <i class="now-ui-icons education_atom"></i>
                </button>
                {{-- <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#"> <i class="now-ui-icons users_circle-08"> All User :  {{count($allUser)}}</i></a>
                  <a class="dropdown-item" href="#"> <i class="now-ui-icons users_single-02"> Admin :  {{count($users_admin)}}</i></a>
                  <a class="dropdown-item" href="#"> <i class="now-ui-icons users_single-02"> User :  {{count($users)}}</i></a>
                </div> --}}
              </div>
            
           <div class="card-body">
            <p style="text-indent: 2em; text-align: justify;">
              Our website is about daily health recording. To track your own health information On our website there are many functions to choose from such as bmi sleep menstruation Food and you can view data for each month in the form of graphs. Including individual health advice. Information is constantly updated to remain relevant to users at all times. Enjoy our website :)
            </p>
            
            </div>

            <div class="card-footer">

              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Admin {{Auth::user()->name}}</h5>
                <h4 class="card-title">All User</h4>
                <div class="dropdown">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons business_badge"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"> <i class="now-ui-icons users_circle-08"> All User :  {{count($allUser)}}</i></a>
                    <a class="dropdown-item" href="#"> <i class="now-ui-icons users_single-02"> Admin :  {{count($users_admin)}}</i></a>
                    <a class="dropdown-item" href="#"> <i class="now-ui-icons users_single-02"> User :  {{count($users)}}</i></a>
                  </div>
                </div>
              </div>

              <div class="card-body">
                <ul>
                  @foreach ($allUser as $item)
                    <li>{{$item->name}}</li>
                  @endforeach
                </ul>
                
              </div>

              <div class="card-footer">
    
              </div>

            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Table List</h5>
                <h4 class="card-title">Table That Admin Can Edit</h4>
                <div class="dropdown">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons emoticons_satisfied"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"> <i class="now-ui-icons users_circle-08"> All User :  {{count($allUser)}}</i></a>
                    <a class="dropdown-item" href="#"> <i class="now-ui-icons users_single-02"> Admin :  {{count($users_admin)}}</i></a>
                    <a class="dropdown-item" href="#"> <i class="now-ui-icons users_single-02"> User :  {{count($users)}}</i></a>
                  </div>
                </div>
              </div>
                <div class="card-body">
                
                 <ul>
                  <li>Users</li>
                  <li>Foods</li>
                  <li>recommandations</li>
                 </ul>
                </div>
              <div class="card-footer">
                {{-- <div class="stats">
                  <i class="now-ui-icons ui-2_time-alarm"></i> Last 7 days
                </div> --}}
              </div>
            </div>
          </div>
        </div>
        
        {{-- <div class="row">
          <div class="col-md-6">
            <div class="card  card-tasks">
              <div class="card-header ">
                <h5 class="card-category">Backend development</h5>
                <h4 class="card-title">Tasks</h4>
              </div>
              <div class="card-body ">
                <div class="table-full-width table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" checked>
                              <span class="form-check-sign"></span>
                            </label>
                          </div>
                        </td>
                        <td class="text-left">Sign contract for "What are conference organizers afraid of?"</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                          </button>
                          <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox">
                              <span class="form-check-sign"></span>
                            </label>
                          </div>
                        </td>
                        <td class="text-left">Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                          </button>
                          <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" checked>
                              <span class="form-check-sign"></span>
                            </label>
                          </div>
                        </td>
                        <td class="text-left">Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                          </button>
                          <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">All Persons List</h5>
                <h4 class="card-title"> Employees Stats</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Name
                      </th>
                      <th>
                        Country
                      </th>
                      <th>
                        City
                      </th>
                      <th class="text-right">
                        Salary
                      </th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          Dakota Rice
                        </td>
                        <td>
                          Niger
                        </td>
                        <td>
                          Oud-Turnhout
                        </td>
                        <td class="text-right">
                          $36,738
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Minerva Hooper
                        </td>
                        <td>
                          Curaçao
                        </td>
                        <td>
                          Sinaai-Waas
                        </td>
                        <td class="text-right">
                          $23,789
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Sage Rodriguez
                        </td>
                        <td>
                          Netherlands
                        </td>
                        <td>
                          Baileux
                        </td>
                        <td class="text-right">
                          $56,142
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Doris Greene
                        </td>
                        <td>
                          Malawi
                        </td>
                        <td>
                          Feldkirchen in Kärnten
                        </td>
                        <td class="text-right">
                          $63,542
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Mason Porter
                        </td>
                        <td>
                          Chile
                        </td>
                        <td>
                          Gloucester
                        </td>
                        <td class="text-right">
                          $78,615
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        
        @else
        {{-- content dashboard for user  --}}
        <div class="row">
          <div class="col-lg">
            <div class="card">
              <div class="card card-header">
  
              </div>
              <div class="card-body">
                <div class="cover">
                  <img src="{{asset('images/cover.jpeg')}}" alt="ปก" >
                  </div>
                  <div class="container">
                  <!-- กล่องบทความสุขภาพที่ 1 -->
                  <div class="article-box">
                  <a href="https://women.trueid.net/detail/ywn1pK0JP4X8">
                  <img img src="{{ asset('images/1.jpeg') }}" alt="บทความสุขภาพ 1" style="width: 100%; ">
                  <p>อยากกินอาหารคลีนแต่ก็ขี้เกียจทำอาหารใครเป็นแบบนี้บ้างเอ่ยใครที่เป็นสายขี้เกียจทำอาหารแบบนี้
                  ตามเรามาทางนี้เลยค่าวันนี้เรามีเมนูอาหารคลีน2566</p>
                  
                  
                  </a>
                  </div>
                  
                  
                  <!-- กล่องบทความสุขภาพที่ 2 -->
                  <div class="article-box">
                  <a href="https://library.wu.ac.th/km/%e0%b8%ad%e0%b8%b2%e0%b8%ab%e0%b8%b2%e0%b8%a3%e0%b9%80%e0%b8%9e%e0%b8%b7%e0%b9%88%e0%b8%ad%e0%b8%aa%e0%b8%b8%e0%b8%82%e0%b8%a0%e0%b8%b2%e0%b8%9e-%e0%b8%81%e0%b8%b4%e0%b8%99%e0%b8%ad%e0%b8%a2%e0%b9%88/?fbclid=IwAR3kxAgNhspPNkk9GHvrdy_FmbLH1pKfn_F6DKLScKV6MCNIE3nb96nzDpU">
                  <img src="{{ asset('images/2.jpeg') }}" alt="บทความสุขภาพ 2" style="width: 100%;">
                  
                  
                  <p>การกินอาหารเพื่อสุขภาพเป็นการเลือกกินอาหารให้หลากหลายและครบ 5 หมู่ในปริมาณที่เหมาะสม ซึ่งจะทำให้ร่างกายได้รับสารอาหารที่เพียงพอต่อความต้องการในแต่ละวัน การกินอาหารที่มีประโยชน์เป็นปัจจัยสำคัญที่ช่วยเสริมสร้างสุขภาพให้แข็งแรง</p>
                  
                  
                  </a>
                  </div>
                  
                  
                  <!-- กล่องบทความสุขภาพที่ 3 -->
                  <div class="article-box">
                  <a href="https://www.sanook.com/health/11493/">
                  <img src="{{asset('images/4.jpeg')}}" alt="บทความสุขภาพ 3">
                  
                  
                  <p>คาร์ดิโอ VS เวทเทรนนิ่ง เราเหมาะกับการออกกำลังกายแบบไหน? ไม่ว่าจะเป็นการออกกำลังกายประเภทใด ด้วยวิธีไหน ก็ส่งผลดีต่อร่างกายได้ทั้งนั้น เพียงแต่หากเรามีความกังวลในเรื่องของผลลัพธ์ที่จะเกิดขึ้น ว่าเป็นไปอย่างที่เราตั้งใจหรือไม่</p>
                  </a>
                  </div>
                  
                  
                  <!-- กล่องบทความสุขภาพที่ 4 -->
                  <div class="article-box">
                  <a href="https://www.phyathai.com/th/article/2380-%E0%B8%AA%E0%B8%A3%E0%B9%89%E0%B8%B2%E0%B8%87%E0%B8%AA%E0%B8%B8%E0%B8%82%E0%B8%A0%E0%B8%B2%E0%B8%9E%E0%B8%94%E0%B8%B5%E0%B9%84%E0%B8%A1%E0%B9%88%E0%B8%A2%E0%B8%B2%E0%B8%81_%E0%B9%81%E0%B8%84?fbclid=IwAR3gVVSxlJBrpIQpAZCgzzJuNTcj-z9b188THvU8Gwc01CLTpR9KXkKbliA">
                  <img src="{{asset('images/5.jpeg')}}" alt="บทความสุขภาพ 4">
                  <p>สร้างสุขภาพดีไม่ยาก แค่ปรับการใช้ชีวิตประจำวันให้ถูกหลัก สนับสนุนให้คนไทยใส่ใจกับการสร้างสุขภาพที่ดี ด้วยเทคนิคการดูแลสุขภาพในหนึ่งวัน เทคนิคที่จะช่วยให้การสร้างสุขภาพที่ดี…ไม่ว่าใครก็ทำได้ ง่ายนิดเดียว!</p>
                  
                  
                  </a>
                  </div>
                  
                  
                  <!-- กล่องบทความสุขภาพที่ 5 -->
                  <div class="article-box">
                  <a href="https://hhcthailand.com/exercise-techniques/?fbclid=IwAR3uEBXdAdmRITAcC3ivL4bzS88qYGFVD8q931eBdFEmQM0iuHrClUm5j_M">
                  <img src="{{asset('images/7.jpeg')}}" alt="บทความสุขภาพ 5">
                  
                  
                  <p>การออกกําลังกายเพื่อสุขภาพคือแนวทางการดูแลสุขภาพตัวเองที่เป็นที่นิยมอย่างมากในกลุ่มคนหนุ่มสาว รวมไปถึงวัยกลางคนและวัยสูงอายุที่ต้องการให้ตัวเองมีสุขภาพที่ดีอยู่เสมอ แต่จะมีสักกี่คนที่รู้ว่าแท้จริงแล้วประโยชน์การออกกำลังกายคืออะไร แล้วการออกกําลังกายเพื่อสุขภาพให้มีประสิทธิภาพนั้นมีเทคนิคอะไรที่เราต้องรู้บ้าง</p>
                  
                  
                  </a>
                  </div>
                  
                  
                  <!-- กล่องบทความสุขภาพที่ 6 -->
                  <div class="article-box">
                  <a href="https://www.petcharavejhospital.com/en/Article/article_detail/How-do-you-do-your-first-period?fbclid=IwAR0lgg6adBwS4ZfWTvg76RLf8D45_7FUmgMu1wgMqS_Ug3rJXh6iyBxkjTU">
                  <img src="{{asset('images/8.jpeg')}}" alt="บทความสุขภาพ 6">
                  
                  
                  <p>ประจำเดือน เป็นสิ่งที่บอกถึงการเปลี่ยนแปลงทางร่างกายของเพศหญิงว่าเข้าสู่วัยเจริญพันธุ์ โดยจะเริ่มเป็นประจำเดือนครั้งแรก เมื่ออายุประมาณ 12-13 ปี และจะหมดประจำเดือนในช่วงอายุประมาณ 45-60 ปี ฉะนั้นจะต้องเตรียมรับมือกับประจำเดือน และเตรียมความพร้อมเมื่อเข้าสู่วัยรุ่นของผู้หญิง</p>
                  
                  
                  </a>
                  </div>
                  
                  
                  <!-- กล่องบทความสุขภาพที่ 7 -->
                  <div class="article-box">
                  <a href="https://www.sikarin.com/health/pms">
                  <img src="{{asset('images/9.jpeg')}}" alt="บทความสุขภาพ 7">
                  
                  
                  <p>ประจำเดือนเป็นสิ่งที่เกิดขึ้นกับผู้หญิงเราทุกคนเมื่อเริ่มเข้าสู่วัยเจริญพันธุ์ ตั้งแต่อายุ 12 ปีขึ้นไป โดยประจำเดือนในช่วง 2 ปีแรกนั้นมักจะมาไม่สม่ำเสมอเพราะการผลิตฮอร์โมนยังไม่สมดุล ปกติแล้วผู้หญิงจะมีรอบเดือนห่างกันทุก ๆ 28 – 33วัน (ขึ้นอยู่กับแต่ละคน) และมีประจำเดือนเฉลี่ยคือ 6 วัน</p>
                  
                  
                  </a>
                  </div>
                  <!-- กล่องบทความสุขภาพที่ 8 -->
                  <div class="article-box">
                  <a href="https://w1.med.cmu.ac.th/otolaryngology/km/sleep-hygiene/">
                  <img src="{{asset('images/10.jpeg')}}" alt="บทความสุขภาพ 8">
                  
                  
                  <p>สุขอนามัยการนอน (Sleep hygiene) เรื่องง่ายๆ ที่อาจถูกมองข้ามการนอนหลับที่ดีจะทำให้ร่างกายเราได้พักผ่อนอย่างเต็มที่ และมีพลังพร้อมที่จะทำกิจกรรมในวันต่อไป คนเราใช้เวลาหนึ่งในสามของวันไปกับการนอน รู้หรือไม่ว่าพฤติกรรมบางอย่างระหว่างวัน โดยเฉพาะช่วงเวลาก่อนนอนอาจส่งผลต่อสุขภาพการนอนของเราได้</p>
                  
                  
                  </a>
              </div>
            </div>
              
          </div>
          
        </div>
      

        @endif
     
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="">
                  HealthCare
                </a>
              </li>
              <li>
                <a href="">
                  About Us
                </a>
              </li>
              <li>
                <a href="">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="" target="_blank">Faro</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>