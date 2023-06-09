<?php $__env->startSection('content'); ?>
    <div class="card table-responsive">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0" style="font-size: 40px">
                <b><?php echo e($title); ?></b>
            </h5>
            <a href="/adminAdd" type="button" class="btn rounded-pill btn-primary justify-content-end"
                style="margin-left: 70%;">Add</a>
        </div>
        <div class="container mt-4 ">
            <table id="datatable" class="table table-striped ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Nomor Telepon</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                    ?>
                    <?php $__currentLoopData = $admin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($no++); ?></td>
                            <td width="auto">
                                <?php if($a->image != null): ?>
                                    <img src="<?php echo e(asset('')); ?>storage/images/users/<?php echo e($a->image); ?>"
                                        style="width: 40px; height: 40px;border-radius: 50%" alt="Gambar Kosong">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('')); ?>storage/images/users/user.png"
                                        style="width: 40px; height: 40px;border-radius: 50%" alt="Gambar Kosong">
                                <?php endif; ?>
                            </td>

                            <td width="auto"><?php echo e($a->nama_lengkap); ?></td>
                            <td width="auto"><?php echo e($a->email); ?></td>
                            <td width="auto"><?php echo e($a->no_tlp); ?></td>
                            <td width="auto">
                                <?php if($a->role == 1): ?>
                                    Admin
                                <?php else: ?>
                                    Kepala Sekolah
                                <?php endif; ?>
                            </td>
                            <td width="auto">
                                <label class="switch switch-primary">
                                    <?php if($a->status == 'ON'): ?>
                                        <input type="checkbox" readonly
                                            class="switch-input" checked />
                                    <?php else: ?>
                                        <input type="checkbox" readonly
                                            class="switch-input" />
                                    <?php endif; ?>

                                    <span class="switch-toggle-slider">
                                        <span class="switch-on">
                                            <i class="bx bx-check"></i>
                                        </span>
                                        <span class="switch-off">
                                            <i class="bx bx-x"></i>
                                        </span>
                                    </span>

                                </label>
                            </td>
                            <td>
                                <a href="/admin/edit/<?php echo e($a->id); ?>" type="button" class="btn btn-success">Edit</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete<?php echo e($a->id); ?>">Delete</button>
                            </td>
                            <div class="modal fade" id="delete<?php echo e($a->id); ?>" tabindex="-1" role="dialog"
                                aria-labelledby="deletemodal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addNewDonaturLabel">Hapus Admin
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Anda yakin ingin menghapus <?php echo e($a->nama_lengkap); ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a href="<?php echo e(url('/admin/delete', $a->id)); ?> "
                                                    class="btn btn-primary">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\spp_hamdani\resources\views/backend/admin/index.blade.php ENDPATH**/ ?>