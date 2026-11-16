const php = @import("php/root.zig");

pub fn @"call show_ini_entries"(self: *@This()) !void {
    php.print("speed = {}\n", .{self.speed});
    php.print("flags = {}\n", .{self.flags});
}

pub const @"use auto getters" = true;
pub const @"use auto setters" = true;

const Speed = enum { slow, faster, fastest };
const Flags = packed struct {
    is_good: bool = false,
    is_fast: bool = false,
    is_cheap: bool = false,
};
pub const @"export Speed" = php.Enum.Custom(Speed);
pub const @"export Flags" = php.Class.Custom(Flags);

speed: Speed = .slow,
flags: Flags = .{},
