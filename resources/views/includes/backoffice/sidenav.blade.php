<section id="back-office-sidenav" style="width: 289px;max-width: 289px;height: calc(100vh - 48px);">
    <div class="w-100 d-flex justify-content-end align-items-center"
        style="height: 48px; border: 1px solid rgba(0,0,0,.125);">
        <i class="fas fa-chevron-left me-3" style="font-size: 1.25rem"></i>
    </div>
    <ul class="list-group" style="border-radius: 0; height: calc(100vh - 64px); overflow-y: auto;">
        <li class="list-group-item p-0">
            <h4 class="color-main py-3 px-3 menu-header">Back Office</h4>
            <div class="py-2 px-3 menu-item">
                <a href="/backoffice" class="d-flex w-100" style="text-decoration: none; color:inherit;">
                    <i class="fa-solid fa-house-chimney me-3"></i>
                    <p>Dashboard</p>
                </a>
            </div>
            <div class="py-2 px-3 menu-item disabled" data-open="false">
                <div class="d-flex"><i class="fas fa-file-invoice me-3"></i>
                    <p>Transaction</p>
                </div><i class="fas fa-angle-down"></i>
            </div>
            <div class="py-2 ps-5 px-3 menu-item d-none">
                <a href="/backoffice/Flight" class="d-flex w-100" style="text-decoration: none; color:inherit;">
                    <i class="fas fa-plane me-3"></i>
                    <p>Flight Users</p>
                </a>
            </div>
            <div class="py-2 ps-5 px-3 menu-item d-none">
                <a href="/backoffice/tour" class="d-flex w-100" style="text-decoration: none; color:inherit;">
                    <i class="fas fa-flag me-3"></i>
                    <p>Tours</p>
                </a>
            </div>

            <div class="py-2 px-3 menu-item disabled" data-open="false">
                <div class="d-flex"><i class="fas fa-database me-3"></i>
                    <p>Master</p>
                </div><i class="fas fa-angle-down"></i>
            </div>
            <div class="py-2 ps-5 px-3 menu-item d-none">
                <a href="/backoffice/supplier" class="d-flex w-100" style="text-decoration: none; color:inherit;">
                    <i class="fas fa-flag me-3"></i>
                    <p>Supplier</p>
                </a>
            </div>
            <div class="py-2 ps-5 px-3 menu-item d-none">
                <a href="/backoffice/tag" class="d-flex w-100" style="text-decoration: none; color:inherit;">
                    <i class="fas fa-tag me-3"></i>
                    <p>Tag</p>
                </a>
            </div>
            <div class="py-2 ps-5 px-3 menu-item d-none">
                <a href="/backoffice/referral" class="d-flex w-100" style="text-decoration: none; color:inherit;">
                    <i class="fas fa-bullhorn me-3"></i>
                    <p>Kode Referral</p>
                </a>
            </div>
            <div class="py-2 px-3 menu-item disabled" data-open="false">
                <div class="d-flex"><i class="fas fa-file-alt me-3"></i>
                    <p>Reports</p>
                </div><i class="fas fa-angle-down"></i>
            </div>
            <div class="py-2 ps-5 px-3 menu-item d-none">
                <a href="/backoffice/customers" class="d-flex w-100" style="text-decoration: none; color:inherit;">
                    <i class="fas fa-smile-beam me-3"></i>
                    <p>Customers</p>
                </a>
            </div>
            <div class="py-2 ps-5 px-3 menu-item d-none">
                <a href="/backoffice/user" class="d-flex w-100" style="text-decoration: none; color:inherit;">
                    <i class="fas fa-users me-3"></i>
                    <p>Users</p>
                </a>
            </div>
            <div class="py-2 ps-5 px-3 menu-item d-none">
                <a href="/backoffice/finance" class="d-flex w-100" style="text-decoration: none; color:inherit;">
                    <i class="fa-solid fa-coins me-3"></i>
                    <p>Finance</p>
                </a>
            </div>
        </li>
        <li class="list-group-item p-0 h-100">
            <h4 class="color-main py-3 px-3 menu-header">CMS</h4>
            <div class="py-2 px-3 menu-item disabled" data-open="false">
                <div class="d-flex"><i class="fas fa-universal-access me-3"></i>
                    <p>Enduser Content</p>
                </div><i class="fas fa-angle-down"></i>
            </div>
            {{-- <div class="py-2 ps-5 px-3 menu-item d-none">
                <a href="/cms/content/staticimg" class="d-flex w-100" style="text-decoration: none; color:inherit;">
                    <i class="fas fa-box me-3"></i>
                    <p>Static Images</p>
                </a>
            </div> --}}
            <div class="py-2 ps-5 px-3 menu-item d-none">
                <a href="/cms/content/carousel" class="d-flex w-100" style="text-decoration: none; color:inherit;">
                    <i class="fas fa-money-bill me-3"></i>
                    <p>Carousel</p>
                </a>
            </div>
            <div class="py-2 ps-5 px-3 menu-item d-none">
                <a href="/cms/content/displaybanner" class="d-flex w-100"
                    style="text-decoration: none; color:inherit;">
                    <i class="fas fa-newspaper me-3"></i>
                    <p>Display Banner</p>
                </a>
            </div>
            <div class="py-2 px-3 menu-item disabled" data-open="false">
                <div class="d-flex"><i class="fas fa-shopping-bag me-3"></i>
                    <p>Product Management</p>
                </div><i class="fas fa-angle-down"></i>
            </div>
            <div class="py-2 ps-5 px-3 menu-item d-none">
                <a href="/cms/tour" class="d-flex w-100" style="text-decoration: none; color:inherit;">
                    <i class="fas fa-flag me-3"></i>
                    <p>Tour</p>
                </a>
            </div>
        </li>
    </ul>
</section>
