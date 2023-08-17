<?php if (!empty($thumbnail)) : ?>

    <div class="form-field">
        <a href="#" class="button term-image-upload" style="display:none">Upload image</a>
        <div class="term-image-preview"><img src="<?php echo esc_url($thumbnail); ?>" style="max-width: 300px;max-height: 300px;"></div>
        <a href="#" class="term-image-remove">Remove image</a>
        <input type="hidden" class="term_thumbnail" name="thumbnail" value="<?php echo esc_url($thumbnail); ?>">
    </div>

<?php else : ?>
    <div class="form-field">
        <?php if (!$is_edit) : ?>
            <label>Image Field</label>
        <?php endif; ?>
        <a href="#" class="button term-image-upload">Upload image</a>
        <div class="term-image-preview"></div>
        <a href="#" class="term-image-remove" style="display:none">Remove image</a>
        <input type="hidden" class="term_thumbnail" name="thumbnail" value="">
    </div>
<?php endif; ?>