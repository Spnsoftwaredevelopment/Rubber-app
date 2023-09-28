<div class="sidebar">
    <div class="sidebar-header" style="width: 100%;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      text-align: center;">

            <img class="img-avatar" src="{{ url('assets/admin/img/avatar.jpg') }}">

        <div>
            <strong>Full name</strong>
        </div>

        <div class="text-muted">
            <small>แผนก</small>
        </div>
    </div>

    <nav class="sidebar-nav content">
        <ul class="nav">
            <li class="nav-title">
                ข้อมูลสรุป
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#"><i class="icon-speedometer"></i> ข้อมูลสรุป</a>
            </li>

            <li class="divider"></li>

            <li class="nav-title">
                การจัดการ
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-social-github"></i> ผู้ควบคุมระบบ</a>
                <ul class="nav-dropdown-items" style="width:100%;">
                    <li class="nav-item" style="#">
                        <a class="nav-link" href="#"><i class="icon-key"></i> บทบาท และ การอนุญาต</a>
                    </li>

                    <li class="nav-item" style="#">
                        <a class="nav-link" href="#"><i class="fa fa-sitemap"></i> จัดการหน่วยงาน</a>
                    </li>

                    <li class="nav-item" style="#">
                        <a class="nav-link" href="#"><i class="icon-user"></i> ผู้ควบคุม</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-star"></i> จัดการหน้าแรก</a>
                </li>
            </li>

            <li class="nav-item">
                <li class="nav-item" style="">
                    <a class="nav-link" href="#"><i class="icon-menu"></i> จัดการเมนู</a>
                </li>
            </li>

            <li class="nav-item">
                <li class="nav-item" style="">
                    <a class="nav-link" href=""><i class="icon-picture"></i> สไลด์โชว์</a>
                </li>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-bullhorn"></i> จัดการข่าวสาร</a>

                <ul class="nav-dropdown-items" style="width:100%;">
                    <li class="nav-item" style="">
                        <a class="nav-link" href="#"><i class="icon-tag"></i> แท็กข่าวสาร</a>
                    </li>

                    <li class="nav-item" style="">
                        <a class="nav-link" href="#"><i class="fa fa-edit"></i> ข่าวสาร และ กิจกรรม</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <li class="nav-item" style="">
                    <a class="nav-link" href="#"><i class="icon-social-youtube"></i> วีดีโอ</a>
                </li>
            </li>
        </ul>
    </nav>

    <div class="sidebar-footer" style="z-index: 1;">
        <ul class="sidebar-footer-menu">
            <li>
                <div class="btn-group dropup">
                    <button type="button" id="signOut">
                        <i class="icon-logout"></i>
                        <span>ออกจากระบบ</span>
                    </button>
                </div>
            </li>
        </ul>

        <ul class="terms">
            <li><a href="#">Developed  </a> &copy; Sand Box™</li>
        </ul>
    </div>
</div>

<script src="{{ asset('assets/admin/js/libs/jquery.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#signOut').on('click',function(){
            window.location.href = "";
        });
    });
</script>
