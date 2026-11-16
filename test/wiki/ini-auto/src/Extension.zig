const php = @import("php/root.zig");

pub fn @"call show_ini_entries"(self: *@This()) !void {
    php.print("boolean = {}\n", .{self.boolean});
    php.print("integer = {d}\n", .{self.integer});
    php.print("float = {d}\n", .{self.float});
    php.print("string = {s}\n", .{self.string});
}

pub const @"use auto getters" = true;
pub const @"use auto setters" = true;

boolean: bool = false,
integer: isize = 0,
float: f64 = 0,
string: []const u8 = "",
