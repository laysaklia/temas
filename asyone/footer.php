<footer>
    <a href="<?php echo esc_url((home_url('/'))) ?>">home</a>
    <div>&copy; <?php echo date('Y') ?> <?php echo (get_user_by('id', 1)->display_name )?></div>
    <a href="#top">topo</a>
</footer>
</div>

<?php wp_footer() ?>
</body>

</html>