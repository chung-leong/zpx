#ifndef PHP_CONFIG_H
#define PHP_CONFIG_H
#define _GNU_SOURCE
#include <stdint.h>
#include <stdlib.h>
#include <string.h>
#include <dirent.h>
#include <utime.h>

#define ZEND_API __attribute__ ((visibility("default")))
#define ZEND_DLEXPORT __attribute__ ((visibility("default")))
#define ZEND_DLIMPORT

#define ZEND_MM_ALIGNMENT 8
#define ZEND_MM_ALIGNMENT_LOG2 3
#define ZEND_SIGNALS 1

#define SIZEOF_INT 4
#define SIZEOF_INTMAX_T 8
#define SIZEOF_LONG 8
#define SIZEOF_LONG_LONG 8
#define SIZEOF_OFF_T 8
#define SIZEOF_PTRDIFF_T 8
#define SIZEOF_SHORT 2
#define SIZEOF_SIZE_T 8

#define HAVE_DLFCN_H

// the use of _Atomic() causes structs to be demoted to opaque by Translate-C
// hence the need to keep the header from being included
#define ZEND_ATOMIC_H
#define ZEND_ATOMIC_LOAD_ACQUIRE_32(ptr) zend_atomic_load_acquire_32(ptr)
static __attribute__((always_inline)) uint32_t zend_atomic_load_acquire_32(const uint32_t *ptr)
{
	return __atomic_load_n(ptr, __ATOMIC_ACQUIRE);
}

// Neon header file causes translate-c to segfault
#undef _M_ARM64
#undef __aarch64__

// message.h has structs with bitfields that it immediately asserts the size of
#define _MACH_MESSAGE_H_

// mach_voucher_types_h uses types defined in mach_message.h
#define _MACH_VOUCHER_TYPES_H_

typedef struct zend_atomic_bool_s {
	volatile _Bool value;
} zend_atomic_bool;

#endif 