const php = @import("php/root.zig");

pub const @"export Point" = php.Class.Custom(struct {
    pub fn @"static call create"(static: *Static) @This() {
        defer {
            static.next_x += 5;
            static.next_y += 5;
        }
        return .{ .x = static.next_x, .y = static.next_y };
    }

    const Static = struct {
        next_x: f64 = 10,
        next_y: f64 = 10,
    };

    pub const @"use auto getters" = true;
    pub const @"use auto setters" = true;

    x: f64 = 0,
    y: f64 = 0,
});
