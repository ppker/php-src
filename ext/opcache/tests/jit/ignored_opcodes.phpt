--TEST--
JIT: ignored opcodes
--INI--
opcache.enable=1
opcache.enable_cli=1
opcache.file_update_protection=0
opcache.jit=function
;opcache.jit_debug=257
zend_test.observer.enabled=1
zend_test.observer.show_output=1
zend_test.observer.observe_all=1
zend_test.observer.show_opcode_in_user_handler=ZEND_BEGIN_SILENCE, ZEND_END_SILENCE
--EXTENSIONS--
opcache
zend_test
--FILE--
<?php
function test(): int
{
    return 0;
}

exit(@test());
?>
--EXPECTF--
<!-- init '%s' -->
<file '%s'>
  <!-- opcode: 'ZEND_BEGIN_SILENCE' in user handler -->
  <!-- opcode: 'ZEND_END_SILENCE' in user handler -->
  <!-- init exit() -->
  <exit>
    <!-- Exception: UnwindExit -->
  </exit>
  <!-- Exception: UnwindExit -->
</file '%s'>
