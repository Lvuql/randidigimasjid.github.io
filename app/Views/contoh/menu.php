<?= $this->extend('layout/main')?>
<?= $this->section('menu')?>
<li>
    <a href="<?= site_url('layout') ?>" class="waves-effect">
        <i class="mdi mdi-airplay"></i>
        <span> Dashboard <span class="badge badge-pill badge-primary float-right">7</span></span>
    </a>
</li>

<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span> Advanced UI </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <li><a href="<?= site_url('v_pengurus') ?>">Highlight</a></li>
        <li><a href="advanced-rating.html">Rating</a></li>
        <li><a href="advanced-alertify.html">Alertify</a></li>
        <li><a href="advanced-rangeslider.html">Range Slider</a></li>
    </ul>
</li>
<?= $this->endSection('')?>