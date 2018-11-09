<script>

    window.onbeforeunload = function ()
    {
        window.scrollTo(0, 0);
    }

</script>
    <div class="loading-container">
        <div class="loading">
            <img src="<?php echo $this->config->item('base_url');?>portal/img/earth_scan.png" />
        </div>
    </div>