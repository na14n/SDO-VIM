<ul class="nav nav-tabs">
    <li class="nav-item">
        <a
            class="nav-link <?php echo $_SERVER['REQUEST_URI'] === '/custodian/custodian-resources' ? 'active' : '' ?>"
            aria-current="<?php echo $_SERVER['REQUEST_URI'] === '/custodian/custodian-resources' ? 'page' : '' ?>"
            href="/custodian/custodian-resources">
            All
        </a>
    </li>
    <li class="nav-item">
        <a
            class="nav-link <?php echo str_contains($_SERVER['REQUEST_URI'], 'new') ? 'active' : '' ?>"
            aria-current="<?php echo str_contains($_SERVER['REQUEST_URI'], 'new') ? 'page' : '' ?>"
            href="/custodian/custodian-resources/new">
            New
        </a>
    </li>
    <li class="nav-item">
        <a
            class="nav-link <?php echo str_contains($_SERVER['REQUEST_URI'], 'working') ? 'active' : '' ?>"
            aria-current="<?php echo str_contains($_SERVER['REQUEST_URI'], 'working') ? 'page' : '' ?>"
            href="/custodian/custodian-resources/working">
            Working
        </a>
    </li>
    <li class="nav-item">
        <a
            class="nav-link <?php echo str_contains($_SERVER['REQUEST_URI'], 'repair') ? 'active' : '' ?>"
            aria-current="<?php echo str_contains($_SERVER['REQUEST_URI'], 'repair') ? 'page' : '' ?>"
            href="/custodian/custodian-resources/repair">
            For Repair
        </a>
    </li>
    <li class="nav-item">
        <a
            class="nav-link <?php echo str_contains($_SERVER['REQUEST_URI'], 'condemned') ? 'active' : '' ?>"
            aria-current="<?php echo str_contains($_SERVER['REQUEST_URI'], 'condemned') ? 'page' : '' ?>"
            href="/custodian/custodian-resources/condemned">
            Condemned
        </a>
    </li>
</ul>