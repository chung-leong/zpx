const php = @import("php/root.zig");

pub const @"export Point" = php.Class.Custom(struct {
    pub fn @"call print"(self: *@This()) void {
        php.print("x = {d}, y = {d}\n", .{ self.x, self.y });
    }

    pub const @"use auto getters" = true;
    pub const @"use auto setters" = true;

    x: f64 = 0,
    y: f64 = 0,
});
