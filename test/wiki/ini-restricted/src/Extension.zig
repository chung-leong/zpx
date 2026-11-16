const php = @import("php/root.zig");

pub const @"use auto getters" = true;
pub const @"use auto setters" = true;

// override auto setter
pub const @"set string (system)" = php.IniEntry.setter(@This(), .string);

boolean: bool = false,
integer: isize = 0,
float: f64 = 0,
string: []const u8 = "",
