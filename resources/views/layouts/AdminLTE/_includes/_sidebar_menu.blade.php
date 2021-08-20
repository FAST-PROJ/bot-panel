<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header" style="color:#fff;"> MENU PRINCIPAL <i class="fa fa-level-down"></i></li>
			<li class="
						{{ Request::segment(1) === null ? 'active' : null }}
						{{ Request::segment(1) === 'home' ? 'active' : null }}
					  ">
				<a href="{{ route('home') }}" title="Dashboard"><i class="fa fa-dashboard"></i> <span> DASHBOARD</span></a>
			</li>

            @if (Auth::user()?->isStudent())
                <li class="{{ Request::segment(1) === 'bot' ? 'active' : null }}">
                    <a href="{{ route('bot.tinker') }}" title="Bot Professor Virtual"><i class="fa fa-android"></i> <span> PROFESSOR VIRTUAL</span></a>
                </li>
            @endif

			@if(Request::segment(1) === 'profile')
                <li class="{{ Request::segment(1) === 'profile' ? 'active' : null }}">
                    <a href="{{ route('profile') }}" title="Profile"><i class="fa fa-user"></i> <span> MEU PERFIL</span></a>
                </li>
			@endif

            @if (Auth::user()?->can('root', ''))
                <li class="treeview
                    {{ Request::segment(1) === 'config' ? 'active menu-open' : null }}
                    {{ Request::segment(1) === 'user' ? 'active menu-open' : null }}
                    {{ Request::segment(1) === 'role' ? 'active menu-open' : null }}
                    ">
                    <a href="#">
                        <i class="fa fa-gear"></i>
                        <span>CONFIGURAÇÕES</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::segment(1) === 'config' && Request::segment(2) === null ? 'active' : null }}">
                            <a href="{{ route('config') }}" title="App Config">
                                <i class="fa fa-gear"></i> <span> CONFIGURAÇÕES DO APP</span>
                            </a>
                        </li>
                        <li class="
                            {{ Request::segment(1) === 'user' ? 'active' : null }}
                            {{ Request::segment(1) === 'role' ? 'active' : null }}
                            ">
                            <a href="{{ route('user') }}" title="Users">
                                <i class="fa fa-user"></i> <span> USUÁRIOS</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
		</ul>
	</section>
</aside>