<div class="page-wrapper chiller-theme">
    <nav id="sidebar" class="sidebar-wrapper">
      <div class="sidebar-content">
        <div class="sidebar-brand">
          <a style="cursor: default; color:white">Perfil de Cliente</a>
          <div id="close-sidebar">
            <i class="fas fa-times"></i>
          </div>
        </div>
        <div class="sidebar-header">
          <div class="user-pic">
            @auth
              <img class="img-responsive img-rounded" src="" alt="avatar" id="avatar">
            @endauth
          </div>
          <div class="user-info">
            <span id="name" class="user-name">Jhon
              <strong>Smith</strong>
            </span>
            <span id="level" class="">Administrator</span>
          </div>
        </div>
        <div class="sidebar-menu">
          <ul>
            <li class="header-menu">
              <span>Client Informations</span>
            </li>
            <li class="sidebar-dropdown">
              <a class="aColor" href="#">
                <i class="fas fa-user icon-color-change"></i>
                <span class="icon-color-change">Personal Informations</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a style="padding-left:0px" class="dataColor" href="#">Name: <i id="firstname" style="font-weight:bold">0la</i></a>
                  </li>
                  <li>
                    <a style="padding-left:0px" class="dataColor" href="#">Surname: <i id="lastname" style="font-weight:bold">0la</i></a>
                  </li>
                  <li>
                    <a style="padding-left:0px" class="dataColor" href="#">Age: <i id="age" style="font-weight:bold">0la</i></a>
                  </li>
                  <li>
                    <a style="padding-left:0px" class="dataColor" href="#">Birth Date:<i id="birthDate" style="font-weight:bold">0la</i></a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidebar-dropdown">
              <a class="aColor" href="#">
                <i class="fa fa-envelope icon-color-change"></i>
                <span class="icon-color-change">Contact Informations </span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li style="width:300px">
                    <a href="#" class="dataColor" style="padding-left:0px">Email: <i id="email" style="font-weight:bold">0la</i></a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidebar-dropdown">
              <a class="aColor" href="#">
                <i class="fa fa-book icon-color-change"></i>
                <span class="icon-color-change">Other Informations</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a style="padding-left:0px" class="dataColor" href="#">Identifier: <i id="identifier" style="font-weight:bold">0la</i></a>
                    </li>
                  <li>
                    <a style="padding-left:0px" class="dataColor" href="#">Created at: <i id="accoutDate" style="font-weight:bold">0la</i></a>
                  </li>
                  <li>
                    <a style="padding-left:0px" class="dataColor" href="#">Updated at: <i id="updateDate" style="font-weight:bold">0la</i></a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
        <div style="width:100%; margin-top: 15px">
            <div style="width: 82%; margin: auto">
                <form style="" id="showUser" method="GET" action="">
                  <button type="submit" style="width:100%; margin-top: 4px" class="btn btn-outline-info">Profile Page</button>
                </form>
            </div>
        </div>
      </div>
    </nav>
</div>

