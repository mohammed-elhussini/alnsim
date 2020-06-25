<div class="card card-sidebar-mobile">
    <ul class="nav nav-sidebar"
        data-nav-type="accordion">

        <!-- Main -->
        <li class="nav-item">
            <a href="{{route('dashboard')}}"
               class="nav-link">
                <i class="icon-home4"></i>
                الرئسية
            </a>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link">
                <i class="icon-users4"></i>
                <span>الأعضاء</span>
            </a>
            <ul class="nav nav-group-sub"
                data-submenu-title="Layouts">
                <li class="nav-item">
                    <a href="{{route('users.index')}}"
                       class="nav-link">
                        كافة الأعضاء
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('users.create')}}"
                       class="nav-link">
                        عضو جديد
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link">
                <i class="icon-snowflake"></i>
                <span>المنتجات</span>
            </a>
            <ul class="nav nav-group-sub"
                data-submenu-title="Layouts">
                <li class="nav-item">
                    <a href="{{route('products.index')}}"
                       class="nav-link">
                        كافة المنتجات
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('products.create')}}"
                       class="nav-link">
                         منتج جديد
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('categories.index')}}"
                       class="nav-link">
                       كافة الأقسام
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('categories.create')}}"
                       class="nav-link">
                      قسم جديد
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>

