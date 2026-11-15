const php = @import("php/root.zig");

pub fn @"call show_options"(_: *@This(), args: struct {
    name: []const u8,
    options: struct {
        param_a: bool = false,
        param_b: i32 = 0,
        param_c: enum { good, bad, ugly } = .good,
    } = .{},
}) !void {
    php.print("options = {}\n", .{args.options});
}
