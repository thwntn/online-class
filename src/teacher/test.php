<form action = "process_delete.php" method = "POST" class = "formXoa" >
                    <button type="submit" class = "btn">Xóa</button>
                    <input type="hidden" name = "mach" value = "<?php echo ($mach);?>">
                    <input type="hidden" name="mon_hoc" value = "<?php echo ($id); ?>" >
                </form>
