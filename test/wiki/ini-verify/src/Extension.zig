const php = @import("php/root.zig");

pub const @"use auto getters" = true;
pub const @"use auto setters" = true;

pub fn @"set string"(self: *@This(), value: []const u8) !void {
    if (value.len > 10) return error.TooLong;
    self.string = value;
}

boolean: bool = false,
integer: isize = 0,
float: f64 = 0,
string: []const u8 = "",
