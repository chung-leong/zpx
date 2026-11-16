const php = @import("php/root.zig");
const getter = php.IniEntry.getter;
const setter = php.IniEntry.setter;

pub fn @"call show_ini_entries"(self: *@This()) !void {
    php.print("boolean = {}\n", .{self.boolean});
    php.print("integer = {d}\n", .{self.integer});
    php.print("float = {d}\n", .{self.float});
    php.print("string = {s}\n", .{self.string});
}

pub const @"get boolean" = getter(@This(), .boolean);
pub const @"set boolean" = setter(@This(), .boolean);

pub const @"get integer" = getter(@This(), .integer);
pub const @"set integer" = setter(@This(), .integer);

pub const @"get float" = getter(@This(), .float);
pub const @"set float" = setter(@This(), .float);

pub const @"get string" = getter(@This(), .string);
pub const @"set string" = setter(@This(), .string);

boolean: bool = false,
integer: isize = 0,
float: f64 = 0,
string: []const u8 = "",
