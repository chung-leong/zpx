const php = @import("php/root.zig");

pub const @"export Example" = php.Class.Custom(struct {
    pub fn initSelf(self: *@This(), args: struct {
        number1: i32,
        number2: i32,
    }) !void {
        php.print("initSelf\n", .{});
        self.* = .{ .number1 = args.number1, .number2 = args.number2 };
    }

    number1: i32,
    number2: i32,
});
