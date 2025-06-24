<ul>
  <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <li>
    <a href="<?php echo e($menu_item->link()); ?>"><?php echo e($menu_item->title); ?></a>
    <?php if($menu_item->children()->count()): ?>
    <?php if (isset($component)) { $__componentOriginalc0c11a66fedda4941e253e3a87fe17f7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc0c11a66fedda4941e253e3a87fe17f7 = $attributes; } ?>
<?php $component = App\View\Components\MainMenu::resolve(['items' => $menu_item->children] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('main-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\MainMenu::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc0c11a66fedda4941e253e3a87fe17f7)): ?>
<?php $attributes = $__attributesOriginalc0c11a66fedda4941e253e3a87fe17f7; ?>
<?php unset($__attributesOriginalc0c11a66fedda4941e253e3a87fe17f7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc0c11a66fedda4941e253e3a87fe17f7)): ?>
<?php $component = $__componentOriginalc0c11a66fedda4941e253e3a87fe17f7; ?>
<?php unset($__componentOriginalc0c11a66fedda4941e253e3a87fe17f7); ?>
<?php endif; ?>
    <?php endif; ?>
  </li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul><?php /**PATH D:\LaravelCourse\voyager-project\resources\views/components/menus/main-menu.blade.php ENDPATH**/ ?>